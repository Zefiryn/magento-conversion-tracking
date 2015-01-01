<?php
/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

class Zefir_ConversionTracking_Helper_BounceX extends Mage_Core_Helper_Abstract {

    /**
     * Path to bouncex enable configuration
     *
     * @var string
     */
    const XPATH_ENABLE = 'conversions/bouncex/enabled';

    /**
     * Path to bouncex js script file configuration
     *
     * @var string
     */
    const XPATH_SCRIPT_SRC = 'conversions/bouncex/script_file';


    /**
     * Check if BounceX submodule is enabled
     *
     * @return boolean
     */
    public function isEnabled() {
        return Mage::getStoreConfig(self::XPATH_ENABLE);
    }

    /**
     * Get BounceX Js SCript URL
     *
     * @return string
     */
    public function getScriptSrc() {
        $url = Mage::getStoreConfig(self::XPATH_SCRIPT_SRC);
        //url given without protocol; started from domain
        if(!strstr($url, '//')) {
            return $url;
        }
        else {
            //url given with protocol or universal // to use the same protocol as current get
            //trim http or htpps from start
            return preg_replace('/^http(s)?:\/\//', null, $url);
        }
    }
}
