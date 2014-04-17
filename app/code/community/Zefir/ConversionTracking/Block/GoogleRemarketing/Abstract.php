<?php
/**
 * @author Zefiryn
 * @package Zefir_ConversionTracking_GoogleRemarketing
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

class Zefir_ConversionTracking_Block_GoogleRemarketing_Abstract extends Zefir_ConversionTracking_Block_Abstract {
  
  protected $_customer = null;
  
  public function getConversionId() {
    return $this->_helper()->getConversionId();
  }
  
  public function getConversionLabel() {
    return $this->_helper()->getConversionLabel();
  }
  
  public function getConversionLanguage() {
    return $this->_helper()->getConversionLanguage();
  }
  
  public function getConversionFormat() {
    return $this->_helper()->getConversionFormat();
  }
  
  public function getConversionColor() {
    return $this->_helper()->getConversionColor();
  }
    
  public function getRemarketingOnlyFlag() {
    return $this->_helper()->getRemarketingOnlyFlag();
  }
    
  public function getEcommProdId() {
    return '';
  }
  
  public function getEcommPageType() {
    return 'other';
  }
  
  public function getEcommTotalValue() {
    return null;
  }
  
  public function getEcommPValue() {
    return null;
  }
  
  public function getHasAccount() {
    return Mage::getSingleton('customer/session')->getId() != null ? 'y' : 'n';
  }
  
  public function getGener() {
    if ($this->_getCustomer())  {
      //add gender info
      if ($this->_getCustomer()->getGender() != null) {
        $gender = $this->_getCustomer()->getResource()->getAttribute('gender')->getFrontend()->getValue($this->_getCustomer());
        return $gender == 'Male' ? 'm' : 'f';
      }
    }
    
    return false;
  }
  
  public function getAge() {
    if ($this->_getCustomer()) {
      //add age info
      if (($dob = $this->_getCustomer()->getDob()) != null) {
        $today = new DateTime();
        $birth = new DateTime($dob);
        return $today->diff($birth)->format('%y');
      }
    }
    
    return false;
  }
  
  protected function _getCustomer() {
    if (Mage::getSingleton('customer/session')->getId() != null && $this->_customer == null) {
      //add customer data
      $this->_customer = Mage::getModel('customer/customer')->load(Mage::getSingleton('customer/session')->getId());
      return $this->_customer;
    }
    else if ($this->_customer != null) {
      return $this->_customer;
    }
    
    return false;
  }
  
  protected function _getGoogleParams() {
    
    $params['ecomm_prodid'] = isset($params['ecomm_prodid']) ? $params['ecomm_prodid'] : $this->getEcommProdId();
    $params['ecomm_pagetype'] = isset($params['ecomm_pagetype']) ? $params['ecomm_pagetype'] : $this->getEcommPageType();
    $params['ecomm_totalvalue'] = isset($params['ecomm_totalvalue']) ? $params['ecomm_totalvalue'] : $this->getEcommTotalValue();
    $params['hasaccount'] = isset($params['hasaccount']) ? $params['hasaccount'] : $this->getHasAccount();
    
    if ($this->getGender()) {
      $params['g'] = $this->getGender();
    }
    if ($this->getAge()) {
      $params['a'] = $this->getAge();
    }
    
    return $params;
  }
  
  public function getGoogleTagParams() {
    
    $params = $this->_getGoogleParams();
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
