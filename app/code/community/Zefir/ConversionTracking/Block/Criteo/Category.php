<?php
/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */
class Zefir_ConversionTracking_Block_Criteo_Category extends Zefir_ConversionTracking_Block_Criteo_Abstract {

    /**
     * Get first 3 product from current product collection
     *
     * @return type
     */
    public function getTopProducts() {
        $collection = Mage::app()->getLayout()->getBlock('product_list')->getLoadedProductCollection();
        $i = 0;
        $list = array();
        foreach($collection as $product) {
            $list [] = $product->getSku();
            if($i++ >= 2) {
                //stop after 3rd element
                break;
            }
        }

        return json_encode($list);
    }
}
