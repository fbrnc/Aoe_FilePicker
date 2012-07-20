<?php

class Aoe_FilePicker_Model_Source_FilePickerServices {

	public function toOptionArray($isMultiselect = false) {
		$options = array();
		$services = array('BOX', 'COMPUTER', 'DROPBOX','FACEBOOK', 'GITHUB', 'GMAIL', 'GOOGLE_DRIVE', 'IMAGE_SEARCH', 'URL', 'WEBCAM');
		foreach ($services as $service) {
			$options[] = array(
				'value'=> 'filepicker.SERVICES.'.$service,
				'label' => Mage::helper('aoe_filepicker')->__($service)
			);
		}
		return $options;
	}

}