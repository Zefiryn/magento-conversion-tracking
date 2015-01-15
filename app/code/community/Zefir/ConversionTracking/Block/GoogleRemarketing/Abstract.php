<?php
/**
 * @author Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

class Zefir_ConversionTracking_Block_GoogleRemarketing_Abstract extends Zefir_ConversionTracking_Block_Abstract {

    /**
     * @var null|\Mage_Customer_Model_Customer
     */
    protected $_customer = null;

    /**
     * @return mixed
     */
    public function getConversionId() {
        return $this->_helper()->getConversionId();
    }

    /**
     * @return mixed
     */
    public function getConversionLabel() {
        return $this->_helper()->getConversionLabel();
    }

    /**
     * @return mixed
     */
    public function getConversionLanguage() {
        return $this->_helper()->getConversionLanguage();
    }

    /**
     * @return mixed
     */
    public function getConversionFormat() {
        return $this->_helper()->getConversionFormat();
    }

    /**
     * @return mixed
     */
    public function getConversionColor() {
        return $this->_helper()->getConversionColor();
    }

    /**
     * @return mixed
     */
    public function getRemarketingOnlyFlag() {
        return $this->_helper()->getRemarketingOnlyFlag();
    }

    /**
     * @return string
     */
    public function getEcommProdId() {
        return '';
    }

    /**
     * @return string
     */
    public function getEcommPageType() {
        return 'other';
    }

    /**
     * @return null
     */
    public function getEcommTotalValue() {
        return null;
    }

    /**
     * @return null
     */
    public function getEcommPValue() {
        return null;
    }

    /**
     * @return string
     */
    public function getReturnCustomer() {
        return Mage::getSingleton('customer/session')->getId() != null ? 'true' : 'false';
    }

    /**
     * @return bool|string
     */
    public function getGender() {
        if($this->_getCustomer()) {
            //add gender info
            if($this->_getCustomer()->getGender() != null) {
                $gender = $this->_getCustomer()->getResource()->getAttribute('gender')->getFrontend()->getValue($this->_getCustomer());

                return $gender == 'Male' ? 'm' : 'f';
            }
        }

        return false;
    }

    /**
     * @return bool|string
     */
    public function getAge() {
        if($this->_getCustomer()) {
            //add age info
            if(($dob = $this->_getCustomer()->getDob()) != null) {
                $today = new DateTime();
                $birth = new DateTime($dob);

                return $today->diff($birth)->format('%y');
            }
        }

        return false;
    }

    /**
     * Prepare params array for the page
     *
     * @return array
     */
    public function getGoogleTagParams() {

        return $this->_getGoogleTagParams();
    }

    /**
     * @return bool|Mage_Customer_Model_Customer
     */
    protected function _getCustomer() {
        if(Mage::getSingleton('customer/session')->getId() != null && $this->_customer == null) {
            //add customer data
            $this->_customer = Mage::getModel('customer/customer')->load(Mage::getSingleton('customer/session')->getId());

            return $this->_customer;
        }
        else if($this->_customer != null) {
            return $this->_customer;
        }

        return false;
    }

    /**
     * Prepare common params array
     * This function is override in child classes to product params specific to the page
     *
     * @return array
     */
    protected function _getGoogleTagParams() {

        if (array_key_exists('ecomm_prodid', $params) || $this->getEcommProdId()) {
            $params['ecomm_prodid'] = isset($params['ecomm_prodid']) ? $params['ecomm_prodid'] : $this->getEcommProdId();
        }
        if (array_key_exists('ecomm_totalvalue', $params) || $this->getEcommTotalValue()) {
            $params['ecomm_totalvalue'] = isset($params['ecomm_totalvalue']) ? $params['ecomm_totalvalue'] : $this->getEcommTotalValue();
        }

        $params['ecomm_pagetype'] = isset($params['ecomm_pagetype']) ? $params['ecomm_pagetype'] : $this->getEcommPageType();
        $params['returnCustomer'] = isset($params['returnCustomer']) ? $params['returnCustomer'] : $this->getReturnCustomer();

        if($this->getGender()) {
            $params['g'] = $this->getGender();
        }
        if($this->getAge()) {
            $params['a'] = $this->getAge();
        }

        return $params;
    }

    /**
     * Get GoogleRemarketing helper object
     *
     * @return \Zefir_ConversionTracking_Helper_GoogleRemarekting
     */
    protected function _helper() {
        return $this->helper('conversiontracking/googleRemarketing');
    }
}
