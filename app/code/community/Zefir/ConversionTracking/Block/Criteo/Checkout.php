<?php
/**
* @author Zefiryn
* @package Zefir_ConversionTracking_Criteo
* @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
*/
class Zefir_ConversionTracking_Block_Criteo_Checkout extends Zefir_ConversionTracking_Block_Criteo_Abstract {
  
  /**
   * Order Ids
   * @var array 
   */
  protected $_orders;
  
  /**
   * Get orders
   */
  public function getOrders() {
    if ($this->_orders == null) {
      $orders = Mage::registry('conversiontracking_order_ids');
      $this->_orders = Mage::getModel('sales/order')->getCollection()->addAttributeToFilter('entity_id', array('in' => $orders));
    }
    return $this->_orders;
  }
  
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
}
