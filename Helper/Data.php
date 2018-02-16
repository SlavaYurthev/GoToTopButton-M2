<?php
/**
 * Go To Top Button
 * 
 * @author Slava Yurthev
 */
namespace SY\GoToTopButton\Helper;

use \Magento\Framework\App\Helper\AbstractHelper;
use \Magento\Store\Model\StoreManagerInterface;
use \Magento\Framework\ObjectManagerInterface;
use \Magento\Framework\App\Helper\Context;
use \Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper {
	const UPLOAD_DIR = 'media/gototopbutton';
	public function getConfigValue($field, $storeId = null){
		return $this->scopeConfig->getValue('sy_gototopbutton/'.$field, ScopeInterface::SCOPE_STORE, $storeId);
	}
	public function getImageUrl($storeId = null){
		$fieldValue = $this->getConfigValue('general/image', $storeId);
		if($fieldValue){
			return rtrim(self::UPLOAD_DIR, '/').'/'.ltrim($fieldValue, '/');
		}
	}
}