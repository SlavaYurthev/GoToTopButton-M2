<?php
/**
 * Go To Top Button
 * 
 * @author Slava Yurthev
 */
namespace SY\GoToTopButton\Block\Adminhtml\System\Config\Form\Field;

use \Magento\Framework\Data\Form\Element\AbstractElement;

class Github extends \Magento\Config\Block\System\Config\Form\Field {
	protected function _getElementHtml(AbstractElement $element){
		return '<p style="padding-top:7px"><a href="https://github.com/'
			.$element->getEscapedValue()
			.'/" target="_blank">'
			.$element->getEscapedValue()
			.'</a></p>';
	}
}