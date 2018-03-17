<?php
/**
 * Go To Top Button
 * 
 * @author Slava Yurthev
 */
namespace SY\GoToTopButton\Block;

class Button extends \Magento\Framework\View\Element\Template {
	protected $helper;
	protected $directoryList;
	protected $_storeManager;
	protected $_assetRepository;
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\SY\GoToTopButton\Helper\Data $helper,
		\Magento\Framework\Filesystem\DirectoryList $directoryList,
		array $data = []
	){
		$this->helper = $helper;
		$this->directoryList = $directoryList;
		$this->_storeManager = $context->getStoreManager();
		$this->_assetRepository = $context->getAssetRepository();
		parent::__construct($context, $data);
	}
	public function getConfig($key){
		return $this->helper->getConfigValue($key, $this->_storeManager->getStore()->getId());
	}
	public function isActive(){
		return ($this->getConfig('general/active') == "1");
	}
	public function getConfigJson(){
		$array = [
			'scrollTop' => $this->getConfig('general/offset')
		];
		return json_encode($array);
	}
	public function getImageUrl(){
		if($imageUrl = $this->helper->getImageUrl()){
			$path = rtrim($this->directoryList->getRoot(), '/').'/'.$imageUrl;
			if(is_file($path) && getimagesize($path)){
				return rtrim($this->getBaseUrl(), '/').'/'.$imageUrl;
			}
		}
		return $this->_assetRepository->createAsset(
				'SY_GoToTopButton::images/default.png', 
				['area' => 'frontend']
			)->getUrl();
	}
}