<?php
/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

class Zefir_ConversionTracking_Block_Facebook_Block extends Zefir_ConversionTracking_Block_Abstract {


    /**
     * @return string
     */
    public function isTrackConversion() {
        return $this->_helper()->isTrackConversion();
    }

    /**
     * @return string
     */
    public function getPixelId() {
        return $this->_helper()->getPixelId();
    }

    /**
     * Get helper instance
     *
     * @return \Zefir_ConversionTracking_Helper_Shoppingcom
     */
    protected function _helper() {
        return Mage::helper('conversiontracking/facebook');
    }
}
