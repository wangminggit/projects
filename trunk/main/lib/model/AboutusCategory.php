<?php

/**
 * Skeleton subclass for representing a row from the 'aboutus_category' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class AboutusCategory extends BaseAboutusCategory {

    public function __toString() {
        return $this->getValue();
    }

}

// AboutusCategory
