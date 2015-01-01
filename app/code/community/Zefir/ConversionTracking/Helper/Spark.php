<?php

/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */
class Zefir_ConversionTracking_Helper_Spark extends Zefir_ConversionTracking_Helper_Data {

    /**
     * @var string
     */
    const XPATH_API_KEY = 'conversions/spark/api_key';

    /**
     * @var string
     */
    const XPATH_TEST_MODE = 'conversions/spark/test_mode';

    /**
     * @var string
     */
    const XPATH_ENABLE = 'conversions/spark/enabled';

    /**
     * Get config value for api key
     *
     * @return string
     */
    public function getApiKey() {
        return Mage::helper('core')->decrypt(Mage::getStoreConfig(self::XPATH_API_KEY));
    }

    /**
     * Get config value for test mode
     *
     * @return string
     */
    public function getTestMode() {
        return Mage::getStoreConfig(self::XPATH_TEST_MODE);
    }

    /**
     * @return boolean
     */
    public function isEnabled() {
        return Mage::getStoreConfig(self::XPATH_ENABLE);
    }
}
