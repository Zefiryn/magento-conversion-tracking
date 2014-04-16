<?php
/**
* @author Zefiryn
* @package Zefir_ConversionTracking_Criteo
* @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
*/
class Zefir_ConversionTracking_Block_Criteo_Search extends Zefir_ConversionTracking_Block_Criteo_Abstract {
 
  public function getTopProducts() {    
    $layout =  $this->getLayout()->getBlock('search_result_list');
    $i = 0;
    $str = '';
    foreach ($layout->getLoadedProductCollection() as $product) {
      $str .= '"' . $product->getSku() . '", ';
      if ($i++ >= 2) {
        break;
      }
    }
    
    return substr($str, 0, -2);
  }
  
  public function getSerchKeywords() {
    return Mage::helper('catalogsearch')->getQuery()->getQueryText();
  }
  
}