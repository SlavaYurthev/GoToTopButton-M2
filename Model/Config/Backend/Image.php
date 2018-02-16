<?php
/**
 * Go To Top Button
 * 
 * @author Slava Yurthev
 */
namespace SY\GoToTopButton\Model\Config\Backend;

use Magento\Framework\App\ObjectManager;

class Image extends \Magento\Config\Model\Config\Backend\Image {
	protected function getUploadDirPath($uploadDir){
		$directoryList = ObjectManager::getInstance()->get('\Magento\Framework\Filesystem\DirectoryList');
		return rtrim($directoryList->getRoot(), '/').'/'.ltrim($uploadDir, '/');
	}
}