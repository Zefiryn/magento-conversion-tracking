<?php
/**
 * @author Zefiryn
 * @package Zefir_ConversionTracking_PriceGrabber
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

class Zefir_ConversionTracking_Block_PriceGrabber_Block extends Zefir_ConversionTracking_Block_Abstract {
  
  /**
   * Get BounceX helper object
   * 
   * @return \Zefir_ConversionTracking_Helper_PriceGrabber
   */
  protected function _helper() {
    return $this->helper('conversiontracking/priceGrabber');
  }
  
  public function getRetId() {
    return $this->_helper()->getRetId();
  }
  
  public function getItemsData($order) {
    
    $str = null;
    $i = 1;
    foreach($order->getAllItems() as $item) {
      $data = array(
                'a' => '',  //Manufacturer
                'b' => '',  //Manufacturer Part Number
                'c' => $item->getPrice(),  //Retailer Price
                'd' => $item->getSku(),  //Internal Merchant SKU
                'e' => '',  //UPC
                'f' => round($item->getQtyOrdered()),  //Quantity
              );
      $str .= 'item'.$i++.'='.implode('|',$data).'&';
    }
    
    return rtrim($str, '&');
   
  }
}
