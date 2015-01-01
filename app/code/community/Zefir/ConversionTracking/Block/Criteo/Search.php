<?php
/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

class Zefir_ConversionTracking_Block_Criteo_Search extends Zefir_ConversionTracking_Block_Criteo_Abstract {

    /**
     * Get first 3 products sku from the search result list
     *
     * @return string
     */
    public function getTopProducts() {
        $layout = $this->getLayout()->getBlock('search_result_list');
        $i = 0;
        $str = '';
        foreach($layout->getLoadedProductCollection() as $product) {
            $str .= '"' . $product->getSku() . '", ';
            if($i++ >= 2) {
                break;
            }
        }

        return substr($str, 0, -2);
    }

    /**
     * Get used search keywords
     *
     * @return mixed
     */
    public function getSerchKeywords() {
        return Mage::helper('catalogsearch')->getQuery()->getQueryText();
    }

}