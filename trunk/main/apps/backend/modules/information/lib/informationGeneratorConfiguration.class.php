<?php

/**
 * information module configuration.
 *
 * @package    huiju.feinong
 * @subpackage information
 * @author     Your name here
 * @version    SVN: $Id: configuration.php 12474 2008-10-31 10:41:27Z fabien $
 */
class informationGeneratorConfiguration extends BaseInformationGeneratorConfiguration {

    public function getPagerMaxPerPage() {
        return 20;
    }

}
