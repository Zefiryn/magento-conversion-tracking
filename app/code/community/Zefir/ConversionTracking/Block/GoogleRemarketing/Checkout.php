<?php
/**
 * @author Zefiryn
 * @package Zefir_ConversionTracking_GoogleRemarketing
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

class Zefir_ConversionTracking_Block_GoogleRemarketing_Checkout extends Zefir_ConversionTracking_Block_GoogleRemarketing_Abstract {
  
  /**
   * Check if this if first order based on customer billing address email
   * 
   * @param Mage_Sales_Model_Order $order
   * @return string
   */
  public function getNewCustomer(Mage_Sales_Model_Order $order) {    
    
    $address = $order->getBillingAddress();
    /* @var $collection Mage_Sales_Model_Resource_Order_Collection */
    $collection = Mage::getModel('sales/order')->getCollection()->addAttributeToFilter('customer_email', array('eq' => $address->getEmail()));
    return $collection->count() == 1 ? '1' : '0';
  }
  
  public function getEcommPageType() {
    return 'purchase';
  }
  
  public function getEcommProdId() {
    $products = array();
    foreach($this->getOrders() as $order) {
      foreach ($order->getItemsCollection() as $item) {
        $products[] = trim($item->getProduct()->getSku());
      }
    }
    return $products;
  }
  public function getEcommPValue() {
    $prices = array();
    foreach($this->getOrders() as $order) {
      foreach ($order->getItemsCollection() as $item) {
        $prices[] = $this->helper('core')->currency($item->getPrice(), false, false);
      }
    }
    return $prices;
  }
  
  public function getEcommQuantity() {
    $qty = array();
    foreach($this->getOrders() as $order) {
      foreach ($order->getItemsCollection() as $item) {
        $qty[] = $item->getQtyOrdered() * 1;
      }
    }
    return $qty;
  }
  
  public function getEcommTotalValue() {
    $total = 0;
    foreach($this->getOrders() as $order) {
      $total += $order->getSubtotal();
    }
    
    return $this->helper('core')->currency($total, false, false);    
  }
  
  
  protected function _getGoogleParams() {
    
    $params = parent::_getGoogleParams();
    $params['ecomm_pvalue'] = $this->getEcommPValue();
    $params['ecomm_quantity'] = $this->getEcommQuantity();
    return $params;
  }
  
}
