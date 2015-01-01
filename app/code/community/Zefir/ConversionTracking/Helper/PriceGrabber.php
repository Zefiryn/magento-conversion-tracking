<?php
/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

class Zefir_ConversionTracking_Helper_PriceGrabber extends Mage_Core_Helper_Abstract {

    /**
     * Path to PriceGrabber RetID
     *
     * @var string
     */
    const XPATH_RET_ID = 'conversions/price_grabber/retid';

    /**
     * Path to PriceGrabber enable configuration
     *
     * @var string
     */
    const XPATH_ENABLE = 'conversions/price_grabber/enabled';

    /**
     * @return boolean
     */
    public function isEnabled() {
        return Mage::getStoreConfig(self::XPATH_ENABLE);
    }

    /**
     * @return string
     */
    public function getRetId() {
        return Mage::getStoreConfig(self::XPATH_RET_ID);
    }

}
