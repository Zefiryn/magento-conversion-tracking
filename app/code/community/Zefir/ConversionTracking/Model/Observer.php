<?php
/**
* @author Zefiryn
* @package Zefir_ConversionTracking
* @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
*/

class Zefir_ConversionTracking_Model_Observer {
  
  /**
   * Save current customer order on a success page
   * 
   * @param Varien_Event_Observer $observer
   * 
   */
  public function saveLastOrderId(Varien_Event_Observer $observer) {
    $orderIds = $observer->getEvent()->getOrderIds();
    Mage::register('conversiontracking_order_ids', $orderIds);   
  }
}