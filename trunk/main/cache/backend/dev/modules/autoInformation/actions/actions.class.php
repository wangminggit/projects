<?php

require_once(dirname(__FILE__).'/../lib/BaseInformationGeneratorConfiguration.class.php');
require_once(dirname(__FILE__).'/../lib/BaseInformationGeneratorHelper.class.php');

/**
 * information actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage information
 * @author     ##AUTHOR_NAME##
 */
abstract class autoInformationActions extends sfActions
{
  public function preExecute()
  {
    $this->configuration = new informationGeneratorConfiguration();

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($this->getActionName())))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $this->dispatcher->notify(new sfEvent($this, 'admin.pre_execute', array('configuration' => $this->configuration)));

    $this->helper = new informationGeneratorHelper();
  }

  public function executeIndex(sfWebRequest $request)
  {
    // filtering
    if ($request->getParameter('filters'))
    {
      $this->setFilters($request->getParameter('filters'));
    }
    
    // sorting
    if ($request->getParameter('sort'))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }

  public function executeFilter(sfWebRequest $request)
  {
    $this->setPage(1);

    if ($request->hasParameter('_reset'))
    {
      $this->setFilters($this->configuration->getFilterDefaults());

      $this->redirect('@information');
    }

    $this->filters = $this->configuration->getFilterForm($this->getFilters());
    unset($this->filters['created_by_admin_user_id']);
    unset($this->filters['image']);
    unset($this->filters['summary']);
    unset($this->filters['body']);
    unset($this->filters['position']);
    unset($this->filters['page_view']);
    unset($this->filters['seo_keywords']);
    unset($this->filters['seo_description']);
    unset($this->filters['created_at']);
    unset($this->filters['updated_at']);

    $this->filters->bind($request->getParameter($this->filters->getName()));
    if ($this->filters->isValid())
    {
      $this->setFilters($this->filters->getValues());

      $this->redirect('@information');
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    $this->setTemplate('index');
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->Information = $this->form->getObject();
    unset($this->form['created_by_admin_user_id']);
    unset($this->form['position']);
    unset($this->form['seo_keywords']);
    unset($this->form['seo_description']);
    unset($this->form['created_at']);
    unset($this->form['updated_at']);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    unset($this->form['created_by_admin_user_id']);
    unset($this->form['position']);
    unset($this->form['seo_keywords']);
    unset($this->form['seo_description']);
    unset($this->form['created_at']);
    unset($this->form['updated_at']);
    $this->Information = $this->form->getObject();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->Information = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->Information);
    unset($this->form['created_by_admin_user_id']);
    unset($this->form['position']);
    unset($this->form['seo_keywords']);
    unset($this->form['seo_description']);
    unset($this->form['created_at']);
    unset($this->form['updated_at']);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->Information = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->Information);
    unset($this->form['created_by_admin_user_id']);
    unset($this->form['position']);
    unset($this->form['seo_keywords']);
    unset($this->form['seo_description']);
    unset($this->form['created_at']);
    unset($this->form['updated_at']);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    $this->getRoute()->getObject()->delete();

    $this->getUser()->setFlash('notice', 'The item was deleted successfully.');

    $this->redirect('@information');
  }

  public function executeBatch(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    if (!$ids = $request->getParameter('ids'))
    {
      $this->getUser()->setFlash('error', 'You must at least select one item.');

      $this->redirect('@information');
    }

    if (!$action = $request->getParameter('batch_action'))
    {
      $this->getUser()->setFlash('error', 'You must select an action to execute on the selected items.');

      $this->redirect('@information');
    }

    if (!method_exists($this, $method = 'execute'.ucfirst($action)))
    {
      throw new InvalidArgumentException(sprintf('You must create a "%s" method for action "%s"', $method, $action));
    }

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($action)))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $validator = new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Information'));
    try
    {
      // validate ids
      $ids = $validator->clean($ids);

      // execute batch
      $this->$method($request);
    }
    catch (sfValidatorError $e)
    {
      $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items as some items do not exist anymore.');
    }

    $this->redirect('@information');
  }

  protected function executeBatchDelete(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $count = 0;
    foreach (InformationPeer::retrieveByPks($ids) as $object)
    {
      $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $object)));

      $object->delete();
      if ($object->isDeleted())
      {
        $count++;
      }
    }

    if ($count >= count($ids))
    {
      $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
    }
    else
    {
      $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items.');
    }

    $this->redirect('@information');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $Information = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $Information)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@information_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'information_edit', 'sf_subject' => $Information));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }

  protected function getFilters()
  {
    return $this->getUser()->getAttribute('information.filters', $this->configuration->getFilterDefaults(), 'admin_module');
  }

  protected function setFilters(array $filters)
  {
    return $this->getUser()->setAttribute('information.filters', $filters, 'admin_module');
  }

  protected function getPager()
  {
    $query = $this->buildQuery();
    $paginateMethod = $this->configuration->getPaginateMethod();
    $pager = $query->$paginateMethod($this->getPage(), $this->configuration->getPagerMaxPerPage());

    return $pager;
  }

  protected function setPage($page)
  {
    $this->getUser()->setAttribute('information.page', $page, 'admin_module');
  }

  protected function getPage()
  {
    return $this->getUser()->getAttribute('information.page', 1, 'admin_module');
  }

  protected function buildQuery()
  {
    if (null === $this->filters)
    {
      $this->filters = $this->configuration->getFilterForm($this->getFilters());
    unset($this->filters['created_by_admin_user_id']);
    unset($this->filters['image']);
    unset($this->filters['summary']);
    unset($this->filters['body']);
    unset($this->filters['position']);
    unset($this->filters['page_view']);
    unset($this->filters['seo_keywords']);
    unset($this->filters['seo_description']);
    unset($this->filters['created_at']);
    unset($this->filters['updated_at']);
    }

    $query = $this->filters->buildCriteria($this->getFilters());
    
    foreach ($this->configuration->getWiths() as $with) {
      $query->joinWith($with);
    }
    
    foreach ($this->configuration->getQueryMethods() as $method) {
      $query->$method();
    }
    
    $this->processSort($query);
    
    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_criteria'), $query);
    $query = $event->getReturnValue();

    return $query;
  }


  protected function processSort($query)
  {
    $sort = $this->getSort();
    if (array(null, null) == $sort)
    {
      return;
    }

    
    try
    {
      $column = InformationPeer::translateFieldName($sort[0], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME);
    }
    catch (PropelException $e)
    {
      // probably a fake column, using a custom orderByXXX() query method
      $column = sfInflector::camelize($sort[0]);
    }
    
    $method = sprintf('orderBy%s', $column);
    
    try
    {
      $query->$method('asc' == $sort[1] ? 'asc' : 'desc');
    }
    catch(PropelException $e)
    {
      // non-existent sorting method
      // ignore the sort parameter
      $this->setSort(array(null, null));
    }
  }

  protected function getSort()
  {
    $sort = $this->getUser()->getAttribute('information.sort', null, 'admin_module');
    if (null === $sort)
    {
      $sort = $this->configuration->getDefaultSort();
      $this->setSort($sort);
    }

    return $sort;
  }

  protected function setSort(array $sort)
  {
    if (null !== $sort[0] && null === $sort[1])
    {
      $sort[1] = 'asc';
    }

    $this->getUser()->setAttribute('information.sort', $sort, 'admin_module');
  }

}
