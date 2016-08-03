<?php

/**
 * regulation module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage regulation
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseRegulationGeneratorHelper extends myModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'regulation' : 'regulation_'.$action;
  }
}
