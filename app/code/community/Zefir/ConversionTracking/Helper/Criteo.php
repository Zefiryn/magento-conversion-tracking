<?php
/**
* @author Zefiryn
* @package Zefir_ConversionTracking
* @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
*/

class Zefir_ConversionTracking_Helper_Criteo extends Mage_Core_Helper_Abstract {
  
  /**
   * Path to criteo enable configuration
   * 
   * @var string
   */
  const XML_CRITEO_ENABLED = 'conversions/criteo/enabled';
  
  /**
   * Path to criteo account id configuration
   * 
   * @var string
   */
  const XML_CRITEO_ACCOUNT_ID = 'conversions/criteo/account_id';
  
  /**
   * Path to criteo js file url
   * 
   * @var string
   */
  const XML_CRITEO_URL = 'conversions/criteo/js_url';
  
  /**
   * Get criteo account ID from configuration
   * 
   * @return type
   */
  public function getAccountId() {
    return Mage::getStoreConfig(self::XML_CRITEO_ACCOUNT_ID);
  }
  
  /**
   * Check if criteo submodule is enabled
   * 
   * @return type
   */
  public function isEnabled() {
    return Mage::getStoreConfig(self::XML_CRITEO_ENABLED);
  }
  
  public function getJsUrl() {
    return Mage::getStoreConfig(self::XML_CRITEO_URL);
  }
}
