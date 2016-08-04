<?php

/**
 * information module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage information
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseInformationGeneratorHelper extends myModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'information' : 'information_'.$action;
  }
}
