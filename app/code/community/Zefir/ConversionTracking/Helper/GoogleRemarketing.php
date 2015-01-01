<?php
/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */
class Zefir_ConversionTracking_Helper_GoogleRemarketing extends Zefir_ConversionTracking_Helper_Data {

    /**
     * Path to GoogleRemarketing enable configuration
     *
     * @var string
     */
    const XPATH_GOOGLEREMARKETING_ENABLED = 'conversions/google_remarketing/enabled';

    /**
     * Path to GoogleRemarketing conversion ID
     *
     * @var string
     */
    const XPATH_CONVERSION_ID = 'conversions/google_remarketing/google_conversion_id';

    /**
     * Path to GoogleRemarketing conversion label setting
     *
     * @var string
     */
    const XPATH_CONVERSION_LABEL = 'conversions/google_remarketing/google_conversion_label';

    /**
     * Path to GoogleRemarketing conversion language setting
     *
     * @var string
     */
    const XPATH_CONVERSION_LANGUAGE = 'conversions/google_remarketing/google_conversion_language';

    /**
     * Path to GoogleRemarketing conversion format setting
     *
     * @var string
     */
    const XPATH_CONVERSION_FORMAT = 'conversions/google_remarketing/google_conversion_format';

    /**
     * Path to GoogleRemarketing conversion color setting
     *
     * @var string
     */
    const XPATH_CONVERSION_COLOR = 'conversions/google_remarketing/google_conversion_color';


    /**
     * Path to GoogleRemarketing remarketing only flag
     *
     * @var string
     */
    const XPATH_REMARKETING_ONLY = 'conversions/google_remarketing/google_remarketing_only';

    /**
     * @return boolean
     */
    public function isEnabled() {
        return Mage::getStoreConfig(self::XPATH_GOOGLEREMARKETING_ENABLED);
    }

    /**
     * @return string
     */
    public function getConversionId() {
        return Mage::getStoreConfig(self::XPATH_CONVERSION_ID);
    }

    /**
     * @return string
     */
    public function getConversionLabel() {
        return Mage::getStoreConfig(self::XPATH_CONVERSION_LABEL);
    }

    /**
     * @return string
     */
    public function getConversionLanguage() {
        return Mage::getStoreConfig(self::XPATH_CONVERSION_LANGUAGE);
    }

    /**
     * @return string
     */
    public function getConversionFormat() {
        return Mage::getStoreConfig(self::XPATH_CONVERSION_FORMAT);
    }

    /**
     * @return string
     */
    public function getConversionColor() {
        return Mage::getStoreConfig(self::XPATH_CONVERSION_COLOR);
    }

    /**
     * @return string
     */
    public function getRemarketingOnlyFlag() {
        return Mage::getStoreConfig(self::XPATH_REMARKETING_ONLY) == 1 ? 'true' : 'false';
    }
}
