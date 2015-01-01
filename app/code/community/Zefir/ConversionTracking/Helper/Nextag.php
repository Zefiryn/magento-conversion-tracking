<?php
/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

class Zefir_ConversionTracking_Helper_Nextag extends Mage_Core_Helper_Abstract {

    /**
     * @var string
     */
    const XPATH_ID = 'conversions/nextag/id';

    /**
     * @var string
     */
    const XPATH_ENABLE = 'conversions/nextag/enabled';

    /**
     * @return boolean
     */
    public function isEnabled() {
        return Mage::getStoreConfig(self::XPATH_ENABLE);
    }

    /**
     * @return string
     */
    public function getId() {
        return Mage::getStoreConfig(self::XPATH_ID);
    }


}
