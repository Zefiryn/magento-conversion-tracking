<?php
/**
 * @author Zefiryn
 * @package Zefir_ConversionTracking_GoogleRemarketing
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

class Zefir_ConversionTracking_Block_GoogleRemarketing_Category extends Zefir_ConversionTracking_Block_GoogleRemarketing_Abstract {
 
  public function getEcommPageType() {
    return 'category';
  }
  
  public function getEcommCategory() {
    return Mage::registry('current_category')->getName();
  }
  
  protected function _getGoogleParams() {
    
    $params = parent::_getGoogleParams();
    $params['ecomm_category'] = $this->getEcommCategory();
    return $params;
  }
}
