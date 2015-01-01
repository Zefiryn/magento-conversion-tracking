<?php
/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

class Zefir_ConversionTracking_Block_GoogleRemarketing_Cart extends Zefir_ConversionTracking_Block_GoogleRemarketing_Abstract {

    /**
     * @return mixed
     */
    protected function _getCartProducts() {
        return Mage::getSingleton('checkout/session')->getQuote()->getAllVisibleItems();
    }

    /**
     * @return string
     */
    public function getEcommPageType() {
        return 'cart';
    }

    /**
     * @return array
     */
    public function getEcommProdId() {
        $products = array();
        foreach($this->_getCartProducts() as $item) {
            $products[] = trim($item->getSku());
        }

        return $products;
    }

    /**
     * @return array
     */
    public function getEcommPValue() {
        $prices = array();
        foreach($this->_getCartProducts() as $item) {
            $prices[] = $item->getRowTotal();
        }

        return $prices;
    }

    /**
     * @return array
     */
    public function getEcommQuantity() {
        $qty = array();
        foreach($this->_getCartProducts() as $item) {
            $qty[] = $item->getQty();
        }

        return $qty;
    }

    /**
     * @return mixed
     */
    public function getEcommTotalValue() {
        return Mage::getSingleton('checkout/cart')->getQuote()->getSubtotal();
    }

    /**
     * @return array
     */
    protected function _getGoogleParams() {

        $params = parent::_getGoogleParams();
        $params['ecomm_pvalue'] = $this->getEcommPValue();
        $params['ecomm_quantity'] = $this->getEcommQuantity();

        return $params;
    }

}
