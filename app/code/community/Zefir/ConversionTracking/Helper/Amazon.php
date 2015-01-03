<?php
/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

class Zefir_ConversionTracking_Helper_Amazon extends Zefir_ConversionTracking_Helper_Data {

    const XPATH_ENABLE = 'conversions/amazon/enabled';
    const XPATH_MERCHANT_ID = 'conversions/amazon/merchant_id';

    /**
     * Check if Amazon tracking is enabled
     *
     * @return boolean
     */
    public function isEnabled() {
        return Mage::getStoreConfig(self::XPATH_ENABLE);
    }

    /**
     * Return Amazon merchant ID
     *
     * @return string
     */
    public function getMerchantId() {
        return Mage::getStoreConfig(self::XPATH_MERCHANT_ID);
    }
}