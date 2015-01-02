<?php
/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */
class Zefir_ConversionTracking_Helper_Facebook extends Zefir_ConversionTracking_Helper_Data {

    /**
     * @var string
     */
    const XPATH_ENABLED = 'conversions/facebook/enabled';

    /**
     * @var string
     */
    const XPATH_PIXEL_ID = 'conversions/facebook/pixel_id';

    /**
     * @var string
     */
    const XPATH_CONVERSION_TRACKING = 'conversions/facebook/track_conversion';

    /**
     * @return boolean
     */
    public function isEnabled() {
        return Mage::getStoreConfig(self::XPATH_ENABLE);
    }

    /**
     * @return string
     */
    public function getPixelId() {
        return Mage::getStoreConfig(self::XPATH_PIXEL_ID);
    }

    /**
     * @return string
     */
    public function isTrackConversion() {
        return Mage::getStoreConfig(self::XPATH_CONVERSION_TRACKING);
    }
}
