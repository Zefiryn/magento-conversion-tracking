<?php
/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

class Zefir_ConversionTracking_Block_Spark_Block extends Zefir_ConversionTracking_Block_Abstract {

    /**
     * @var Mage_Sales_Model_Order
     */
    protected $_order;

    /**
     * Get config value for api key
     *
     * @return string
     */
    public function getApiKey() {
        return $this->_getHelper()->getApiKey();
    }

    /**
     * Get config value for test mode
     *
     * @return string
     */
    public function getTestMode() {
        return $this->_getHelper()->getTestMode();
    }

    /**
     * Create json string with purchase data.
     * The json array should be formatted as following:
     *
     * first_name    : First name of consumer
     * last_name     : Last name of consumer
     * email         : Email of consumer
     * total         : Total purchase amount
     *
     * items         : array of basket items. Sample included below / Free form
     *  - name       : Product name / item and/or Keywords (dinner, "Canon Digital Camera D300", etc)
     *  - price      :  price
     *  - qty        :  quantity
     *
     * locations     : array of relevant locations & time (eg: billing, shipping, event address )
     *  - type       : permanent or temporary. In this case, permanent is for billing or shipping, temporary is for an
     *  event location/destination/etc
     *  - name       : location name / 'billing' or 'shipping' or 'Club 31' etc.
     *  - address1   : street address
     *  - city       : city
     *  - postcode   : zipcode
     *
     * @return string
     */
    public function getOrderJsonData() {
        /** @var Mage_Sales_Model_Order $order */
        $order = $this->_getOrder();

        /**
         * create basic arrat
         */
        $data = array(
            'first_name' => $order->getBillingAddress()->getFirstname(),
            'last_name' => $order->getBillingAddress()->getLastname(),
            'email' => $order->getBillingAddress()->getEmail(),
            'total' => (string)Mage::helper('core')->currency($order->getGrandTotal(), false, false),
            'items' => array(),
            'locations' => array(),
        );

        /**
         * add address info
         *
         * @var Mage_Sales_Model_Order_Address $address
         */
        foreach($order->getAddressesCollection() as $address) {
            $data['locations'][] = array(
                'type' => 'permanent',
                'name' => $address->getAddressType(),
                'address1' => $address->getStreetFull(),
                'city' => $address->getCity(),
                'postcode' => $address->getPostcode()
            );
        }

        /**
         * add items info
         *
         * @var Mage_Sales_Model_Item $item
         */
        foreach($order->getItemsCollection() as $item) {
            $data['items'][] = array(
                'name' => $item->getName(),
                'price' => (string)Mage::helper('core')->currency($item->getPrice(), false, false),
                'qty' => (string)$item->getQtyOrdered() * 1
            );
        }

        return Mage::helper('core')->jsonEncode($data);
    }

    /**
     * Retrieve current order
     *
     * @return Mage_Sales_Model_Order
     */
    protected function _getOrder() {
        if (null === $this->_order) {
            $this->_order = $this->getOrders()->getFirstItem();
        }

        return $this->_order;
    }

    /**
     * Get helper instance
     *
     * @return \Zefir_ConversionTracking_Helper_Shoppingcom
     */
    protected function _getHelper() {
        return Mage::helper('conversiontracking/spark');
    }

}
