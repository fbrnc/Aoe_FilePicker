<?php

/**
 * File uploader
 *
 * @author Fabrizio Branca
 * @since 2012-07-19
 */
class Aoe_FilePicker_Model_FileUploader extends Mage_Core_Model_File_Uploader {

	/**
	 * Constructor
	 *
	 * @param $fileId
	 */
	public function __construct(array $data) {

		// parse filepicker.io's response
		$fpResponse = $data['fpResponse'];
		$fileName = $fpResponse['data']['filename'];
		$fpUrl = $fpResponse['url'];

		// download the file from filepicker.io to a temporary file
		$tmpfname = tempnam(sys_get_temp_dir(), 'FPIO');
		file_put_contents($tmpfname, file_get_contents($fpUrl));

		// fake upload
		$_FILES['image'] = array(
			'name' => $fileName,
			'type' => 'application/octet-stream',
			'tmp_name' => $tmpfname,
			'error' => 0,
			'size' => filesize($tmpfname)
		);

		parent::__construct($data['fileId']);
	}

	/**
	 * Move files from TMP folder into destination folder
	 * Using simply "rename" instead of "move_uploaded_file" as latter one would
	 * detect the fake upload
	 *
	 * @param string $tmpPath
	 * @param string $destPath
	 * @return bool
	 */
	protected function _moveFile($tmpPath, $destPath) {
		// return move_uploaded_file($tmpPath, $destPath);
		return rename($tmpPath, $destPath);
	}

}