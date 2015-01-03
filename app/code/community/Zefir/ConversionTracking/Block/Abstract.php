<?php
/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

/**
 * Default block class
 */
class Zefir_ConversionTracking_Block_Abstract extends Mage_Core_Block_Template {

    /**
     * Orders collection
     *
     * @var Mage_Sales_Model_Resource_Order_Collection
     */
    protected static $_orders;

    /**
     * Get GoogleRemarketing helper object
     *
     * @return \Zefir_ConversionTracking_Helper_GoogleRemarekting
     */
    protected function _helper() {
        return $this->helper('conversiontracking');
    }

    /**
     * Check if module is enabled before rendering the block
     *
     * @return string
     */
    protected function _toHtml() {
        Mage::log(get_class($this).'::'.get_class($this->_helper()));
        if(!$this->_helper()->isEnabled()) {
            return '';
        }

        return parent::_toHtml();
    }

    /**
     * Get orders
     *
     * @return Mage_Sales_Model_Resource_Order_Collection
     */
    public function getOrders() {
        if(Mage::registry('conversiontracking_order_ids') && self::$_orders == null) {
            $orders = Mage::registry('conversiontracking_order_ids');
            self::$_orders = Mage::getModel('sales/order')->getCollection()->addAttributeToFilter('entity_id', array('in' => $orders));
        }

        return self::$_orders;
    }
}