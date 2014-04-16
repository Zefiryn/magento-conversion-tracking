<?php
/**
 * @author Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

/**
 * Default block class
 */
class Zefir_ConversionTracking_Block_Abstract extends Mage_Core_Block_Template {
  
  /**
   * Get GoogleRemarketing helper object
   * 
   * @return \Zefir_ConversionTracking_Helper_GoogleRemarekting
   */
  protected function _helper() {
    return $this->helper('conversiontracking');
  }
  
  /**
   * Check if module is enabled before rendering the block
   * 
   * @return string
   */
  protected function _toHtml() {
    if (!$this->_helper()->isEnabled()) {
      return '';
    }
    
    return parent::_toHtml();
  }
}