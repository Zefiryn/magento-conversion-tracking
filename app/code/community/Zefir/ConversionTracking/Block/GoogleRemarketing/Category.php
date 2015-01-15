<?php
/**
 * @author  Zefiryn
 * @package Zefir_ConversionTracking
 * @license http://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0 (MPL)
 */

class Zefir_ConversionTracking_Block_GoogleRemarketing_Category extends Zefir_ConversionTracking_Block_GoogleRemarketing_Abstract {

    /**
     * @return string
     */
    public function getEcommPageType() {
        return 'category';
    }

    /**
     * @return mixed
     */
    public function getEcommCategory() {
        return Mage::registry('current_category')->getName();
    }

    /**
     * @return mixed
     */
    protected function _getGoogleTagParams() {

        $params = parent::_getGoogleTagParams();
        $params['ecomm_category'] = $this->getEcommCategory();

        return $params;
    }
}
