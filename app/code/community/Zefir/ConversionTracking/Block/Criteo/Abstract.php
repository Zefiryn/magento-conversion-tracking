<?php
/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */
class Zefir_ConversionTracking_Block_Criteo_Abstract extends Zefir_ConversionTracking_Block_Abstract {

    /**
     * Get current customer ID
     *
     * @return int
     */
    public function getCustomerId() {
        return Mage::getSingleton('customer/session')->getId();
    }

    /**
     * Get Criteo Account ID
     *
     * @return int
     */
    public function getAccountId() {
        return $this->_helper()->getAccountId();
    }

    /**
     * Get criteo helper object
     *
     * @return \Zefir_ConversionTracking_Helper_Criteo
     */
    protected function _helper() {
        return $this->helper('conversiontracking/criteo');
    }

}
