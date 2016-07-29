<?php

require_once dirname(__FILE__) . '/../lib/blacklistGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/blacklistGeneratorHelper.class.php';

/**
 * blacklist actions.
 *
 * @package    huiju.feinong
 * @subpackage blacklist
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class blacklistActions extends autoBlacklistActions {

    public function executeEdit(sfWebRequest $request) {
        $this->redirect('@blacklist');
    }

}
