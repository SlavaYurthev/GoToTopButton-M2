<?php
/**
 * Go To Top Button
 * 
 * @author Slava Yurthev
 */
namespace SY\GoToTopButton\Block;

class Button extends \Magento\Framework\View\Element\Template {
	protected $helper;
	protected $store;
	protected $directoryList;
	protected $assetRepository;
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\SY\GoToTopButton\Helper\Data $helper,
		\Magento\Store\Model\StoreManagerInterface $store,
		\Magento\Framework\Filesystem\DirectoryList $directoryList,
		\Magento\Framework\View\Asset\Repository $assetRepository,
		array $data = []
	){
		$this->helper = $helper;
		$this->store = $store;
		$this->directoryList = $directoryList;
		$this->assetRepository = $assetRepository;
		parent::__construct($context, $data);
	}
	public function getConfig(string $key){
		return $this->helper->getConfigValue($key, $this->store->getStore()->getId());
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
		return $this->assetRepository->createAsset(
				'SY_GoToTopButton::images/default.png', 
				['area' => 'frontend']
			)->getUrl();
	}
}