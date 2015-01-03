<?php

class Zefir_ConversionTracking_Block_Amazon_Block extends Zefir_ConversionTracking_Block_Abstract {

    /**
     * Get Amazon helper object
     *
     * @return \Zefir_ConversionTracking_Helper_Amazon
     */
    protected function _helper() {
        return $this->helper('conversiontracking/amazon');
    }


}