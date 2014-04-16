<?php
/**
* @author Zefiryn
* @package Zefir_ConversionTracking_Criteo
* @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
*/
class Zefir_ConversionTracking_Block_Criteo_Js extends Zefir_ConversionTracking_Block_Criteo_Abstract {

  /**
   * Format criteo js url
   * 
   * @return string
   */
  public function getCriteoJsUrl() {
    $url = $this->_helper()->getJsUrl();
    
    //url given without protocol; started from domain
    if (!strstr($url, '//')) {
      return '//' . $url;
    }
    else {
      //url given with protocol of universal // to use the same protocol as current get
      //trim http or htpps from start
      return preg_replace('/^http(s)?:/', null, $url);
    }
  }
}
