<?php

/**
 * Filepicker widget acting as a replacement for the normal uploader widget
 *
 * @author Fabrizio Branca
 * @since 2012-07-19
 */
class Aoe_FilePicker_Block_FilePicker extends Mage_Adminhtml_Block_Media_Uploader {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
		$this->setTemplate('media/filepicker.phtml');
	}

	/**
	 * Get filepicker.io API key
	 *
	 * @return string
	 */
	public function getApiKey() {
		return Mage::getStoreConfig('admin/aoe_filepicker/apikey');
	}

	/**
	 * Get active filepicker.io services
	 *
	 * @return array
	 */
	public function getServices() {
		return Mage::getStoreConfig('admin/aoe_filepicker/services');
	}

}