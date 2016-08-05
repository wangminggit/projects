<?php

/**
 * aboutus module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage aboutus
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseAboutusGeneratorHelper extends myModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'aboutus' : 'aboutus_'.$action;
  }
}
