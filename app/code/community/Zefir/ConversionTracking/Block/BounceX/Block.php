<?php
/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */
class Zefir_ConversionTracking_Block_BounceX_Block extends Zefir_ConversionTracking_Block_Abstract {

    /**
     * Get BounceX helper object
     *
     * @return \Zefir_ConversionTracking_Helper_BounceX
     */
    protected function _helper() {
        return $this->helper('conversiontracking/bounceX');
    }
}