<?php
/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

class Zefir_ConversionTracking_Block_Nextag_Block extends Zefir_ConversionTracking_Block_Abstract {

    public function getId() {
        return $this->_getHelper()->getId();
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
        return Mage::helper('conversiontracking/nextag');
    }

}
