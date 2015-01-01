<?php
/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

class Zefir_ConversionTracking_Helper_Shoppingcom extends Zefir_ConversionTracking_Helper_Data {

    /**
     * @var string
     */
    const XPATH_MERCHANT_ID = 'conversions/shoppingcom/merchant_id';

    /**
     * @var string
     */
    const XPATH_ENABLE = 'conversions/shoppingcom/enabled';

    /**
     * @return boolean
     */
    public function isEnabled() {
        return Mage::getStoreConfig(self::XPATH_ENABLE);
    }

    /**
     * @return string
     */
    public function getMerchantId() {
        return Mage::getStoreConfig(self::XPATH_MERCHANT_ID);
    }
}
