<?php

/**
 * regulation module configuration.
 *
 * @package    huiju.feinong
 * @subpackage regulation
 * @author     Your name here
 * @version    SVN: $Id: configuration.php 12474 2008-10-31 10:41:27Z fabien $
 */
class regulationGeneratorConfiguration extends BaseRegulationGeneratorConfiguration {

    public function getPagerMaxPerPage() {
        return 20;
    }

}
