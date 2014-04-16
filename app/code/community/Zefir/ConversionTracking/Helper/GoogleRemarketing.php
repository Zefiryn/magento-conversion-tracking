<?php
/**
* @author Zefiryn
* @package Zefir_ConversionTracking_GoogleRemarketing
* @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
*/
class Zefir_ConversionTracking_Helper_GoogleRemarketing extends Mage_Core_Helper_Abstract {
  
  /**
   * Path to GoogleRemarketing enable configuration
   * 
   * @var string
   */
  const XPATH_GOOGLEREMARKETING_ENABLED = 'conversions/google_remarketing/enabled';
  
  /**
   * Path to GoogleRemarketing conversion ID
   * 
   * @var string
   */
  const XPATH_CONVERSION_ID = 'conversions/google_remarketing/google_conversion_id';
  
  /**
   * Path to GoogleRemarketing conversion label setting
   * 
   * @var string
   */
  const XPATH_CONVERSION_LABEL = 'conversions/google_remarketing/google_conversion_label';
  
  /**
   * Path to GoogleRemarketing conversion language setting
   * 
   * @var string
   */
  const XPATH_CONVERSION_LANGUAGE = 'conversions/google_remarketing/google_conversion_language';  
  
  /**
   * Path to GoogleRemarketing conversion format setting
   * 
   * @var string
   */
  const XPATH_CONVERSION_FORMAT = 'conversions/google_remarketing/google_conversion_format';  
  
  /**
   * Path to GoogleRemarketing conversion color setting
   * 
   * @var string
   */
  const XPATH_CONVERSION_COLOR = 'conversions/google_remarketing/google_conversion_color';  
  
  
  /**
   * Path to GoogleRemarketing remarketing only flag
   * 
   * @var string
   */
  const XPATH_REMARKETING_ONLY = 'conversions/google_remarketing/google_remarketing_only';
  
  public function isEnabled() {
    return Mage::getStoreConfig(self::XPATH_GOOGLEREMARKETING_ENABLED);
  }
  
  public function getConversionId() {
    return Mage::getStoreConfig(self::XPATH_CONVERSION_ID);
  }
  
  public function getConversionLabel() {
    return Mage::getStoreConfig(self::XPATH_CONVERSION_LABEL);
  }
  
  public function getConversionLanguage() {
    return Mage::getStoreConfig(self::XPATH_CONVERSION_LANGUAGE);
  }
  
  public function getConversionFormat() {
    return Mage::getStoreConfig(self::XPATH_CONVERSION_FORMAT);
  }
  
  public function getConversionColor() {
    return Mage::getStoreConfig(self::XPATH_CONVERSION_COLOR);
  }
  
  public function getRemarketingOnlyFlag() {
    return Mage::getStoreConfig(self::XPATH_REMARKETING_ONLY) == 1 ? 'true' : 'false';
  }
}
