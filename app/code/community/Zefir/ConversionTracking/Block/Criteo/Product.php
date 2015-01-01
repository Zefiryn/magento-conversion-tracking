<?php
/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */
class Zefir_ConversionTracking_Block_Criteo_Product extends Zefir_ConversionTracking_Block_Criteo_Abstract {

    /**
     * Get current product sku
     *
     * @return null
     */
    public function getProductName() {
        $product = Mage::registry('current_product');
        if($product) {
            return $product->getSku();
        }

        return null;
    }

}