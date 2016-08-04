<?php

/**
 * information module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage information
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseInformationGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%id%% - %%_information_category_id%% - %%_title%% - %%_is_enable%% - %%page_view%% - %%_release_date%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return '信息中心列表';
  }

  public function getEditTitle()
  {
    return '编辑信息';
  }

  public function getNewTitle()
  {
    return '新建信息';
  }

  public function getFilterDisplay()
  {
    return array(  0 => 'information_category_id',  1 => 'title',  2 => 'is_enable',  3 => 'release_date',);
  }

  public function getFormDisplay()
  {
    return array(  0 => 'information_category_id',  1 => 'title',  2 => 'release_date',  3 => 'image',  4 => 'summary',  5 => 'body',  6 => 'page_view',  7 => 'is_enable',);
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => 'id',  1 => '_information_category_id',  2 => '_title',  3 => '_is_enable',  4 => 'page_view',  5 => '_release_date',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'information_category_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => '类别',),
      'created_by_admin_user_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'title' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => '标题',),
      'release_date' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',  'label' => '发布日期',),
      'image' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => '缩略图',),
      'summary' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => '摘要',),
      'body' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => '正文内容',),
      'is_enable' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => '状态',  'help' => '勾选之后则可以正常访问，否则将不能访问该文章',),
      'position' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'page_view' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => '浏览量',),
      'seo_keywords' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => '关键词',),
      'seo_description' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => '描述',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => '添加日期',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'information_category_id' => array(),
      'created_by_admin_user_id' => array(),
      'title' => array(),
      'release_date' => array(),
      'image' => array(),
      'summary' => array(),
      'body' => array(),
      'is_enable' => array(),
      'position' => array(),
      'page_view' => array(),
      'seo_keywords' => array(),
      'seo_description' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'information_category_id' => array(),
      'created_by_admin_user_id' => array(),
      'title' => array(),
      'release_date' => array(),
      'image' => array(),
      'summary' => array(),
      'body' => array(),
      'is_enable' => array(),
      'position' => array(),
      'page_view' => array(),
      'seo_keywords' => array(),
      'seo_description' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'information_category_id' => array(),
      'created_by_admin_user_id' => array(),
      'title' => array(),
      'release_date' => array(),
      'image' => array(),
      'summary' => array(),
      'body' => array(),
      'is_enable' => array(),
      'position' => array(),
      'page_view' => array(),
      'seo_keywords' => array(),
      'seo_description' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'information_category_id' => array(),
      'created_by_admin_user_id' => array(),
      'title' => array(),
      'release_date' => array(),
      'image' => array(),
      'summary' => array(),
      'body' => array(),
      'is_enable' => array(),
      'position' => array(),
      'page_view' => array(),
      'seo_keywords' => array(),
      'seo_description' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'information_category_id' => array(),
      'created_by_admin_user_id' => array(),
      'title' => array(),
      'release_date' => array(),
      'image' => array(),
      'summary' => array(),
      'body' => array(),
      'is_enable' => array(),
      'position' => array(),
      'page_view' => array(),
      'seo_keywords' => array(),
      'seo_description' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'InformationForm';
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'InformationFormFilter';
  }

  public function getPaginateMethod()
  {
    return 'paginate';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array('id', 'desc');
  }

  public function getWiths()
  {
    return array();
  }
  
  public function getQueryMethods()
  {
    return array();
  }
}
