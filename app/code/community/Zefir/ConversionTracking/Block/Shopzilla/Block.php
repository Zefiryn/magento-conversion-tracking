<?php

/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */
class Zefir_ConversionTracking_Block_Shopzilla_Block extends Zefir_ConversionTracking_Block_Abstract {

    /**
     * @var Mage_Sales_Model_Order
     */
    protected $_order;

    /**
     * Get merchant id from configuration System Configuration
     *
     * @return type
     */
    public function getMerchantId() {
        return $this->_getHelper()->getMerchantId();
    }

    /**
     * Get customer type (new or returning)
     *
     * @return integer
     */
    public function getCustomerType() {
        $checkout = Mage::getSingleton('checkout/type_onepage');

        return $checkout->getCheckoutMethod() == Mage_Checkout_Model_Type_Onepage::METHOD_CUSTOMER ? 0 : 1;
    }

    /**
     * Get order grand total value and format it
     *
     * @return string
     */
    public function getOrderValue() {
        if($this->_getOrder()) {
            return $this->helper('core')->currency($this->_getOrder()->getGrandTotal(), false, false);
        }

        return null;
    }

    /**
     * Get order incremental value
     *
     * @return string
     */
    public function getOrderId() {
        if($this->_getOrder()) {
            return $this->_getOrder()->getIncrementId();
        }

        return null;
    }

    /**
     * Get ordered quantity
     *
     * @return float
     */
    public function getUnitsOrdered() {
        if($this->_getOrder()) {
            return $this->_getOrder()->getTotalQtyOrdered() * 1;
        }

        return null;
    }

    /**
     * Retrieve current order
     *
     * @return Mage_Sales_Model_Order
     */
    protected function _getOrder() {
        if (null === $this->_order) {
            $this->_order = $this->getOrders()->getFirstItem();
        }

        return $this->_order;
    }

    /**
     * Get helper instance
     *
     * @return \Zefir_ConversionTracking_Helper_Shopzilla
     */
    protected function _getHelper() {
        return Mage::helper('conversiontracking/shoppingcom');
    }

}