<?php
/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

class Zefir_ConversionTracking_Block_GoogleRemarketing_Product extends Zefir_ConversionTracking_Block_GoogleRemarketing_Abstract {

    /**
     * Currently viewed product
     *
     * @var Mage_Catalog_Model_Product
     */
    protected $_product;

    /**
     * @return false|Mage_Catalog_Model_Product
     */
    protected function _getProduct() {

        if($this->_product == null) {
            $product = Mage::registry('current_product');
            if(!$product) {
                $product = Mage::getModel('catalog/product');
            }
            $this->_product = $product;
        }

        return $this->_product;
    }

    /**
     * @return string
     */
    public function getEcommPageType() {
        return 'product';
    }

    /**
     * @return string
     */
    public function getEcommProdId() {
        return trim($this->_getProduct()->getSku());
    }

    /**
     * @return string
     */
    public function getEcommTotalValue() {
        return Mage::helper('core')->currency($this->_getProduct()->getFinalPrice(), false, false);
    }


}