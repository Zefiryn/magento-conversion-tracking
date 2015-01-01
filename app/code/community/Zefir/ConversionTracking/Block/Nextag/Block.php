<?php
/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

class Zefir_ConversionTracking_Block_Nextag_Block extends Mage_Core_Block_Template {

    /**
     *
     * @var \Zefir_ConversionTracking_Helper_Nextag
     */
    protected $_helper;

    public function getId() {
        return $this->_getHelper()->getId();
    }

    /**
     * Get customer last orders
     *
     * @return \Mage_Sales_Model_Resource_Order_Collection
     */
    public function getOrders() {
        if($this->_orders == null) {
            $orders = Mage::registry('conversiontracking_order_ids');
            $this->_order = Mage::getModel('sales/order')->getCollection()->addAttributeToFilter('entity_id', array('in' => $orders));
        }

        return $this->_order;
    }

    /**
     * Get order amount without shipping and tax
     *
     * @param Mage_Sales_Model_Order $order
     * @return float
     */
    public function getOrderAmount(Mage_Sales_Model_Order $order) {
        $orderAmount = (float)$order->getSubtotal() - (float)$order->getDiscountAmount();

        return $orderAmount;
    }

    /**
     * Get skus of all products from the order
     *
     * @param Mage_Sales_Model_Order $order
     * @return string
     */
    public function getProductSkus(Mage_Sales_Model_Order $order) {
        $skus = array();
        foreach($order->getAllItems() as $item) {
            $skus[] = $item->getSku();
        }

        return implode('|', $skus);
    }

    /**
     * Get qty of all products from the order
     *
     * @param Mage_Sales_Model_Order $order
     * @return string
     */
    public function getProductQty(Mage_Sales_Model_Order $order) {
        $qty = array();

        foreach($order->getAllItems() as $item) {
            $qty[] = $item->getQtyOrdered() * 1;
        }

        return implode('|', $qty);
    }


    /**
     * Get helper instance
     *
     * @return \Zefir_ConversionTracking_Helper_Nextag
     */
    protected function _getHelper() {
        if(null === $this->_helper) {
            $this->_helper = Mage::helper('conversiontracking/nextag');
        }

        return $this->_helper;
    }

    protected function _toHtml() {
        if($this->_getHelper()->isEnabled()) {
            return parent::_toHtml();
        }

        return '';
    }

}
