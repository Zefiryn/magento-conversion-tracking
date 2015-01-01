<?php
/**
 * @author Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

class Zefir_ConversionTracking_Block_Criteo_Cart extends Zefir_ConversionTracking_Block_Criteo_Abstract {

    /**
     * Get Quote products
     *
     * @return array
     */
    public function getCartProducts() {
        return Mage::getSingleton('checkout/session')->getQuote()->getAllVisibleItems();
    }

}
