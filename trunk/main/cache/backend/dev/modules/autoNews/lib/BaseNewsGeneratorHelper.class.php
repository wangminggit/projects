<?php

/**
 * news module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage news
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseNewsGeneratorHelper extends myModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'news' : 'news_'.$action;
  }
}
