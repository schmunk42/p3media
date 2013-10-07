<?php
/**
 * Class File
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @link http://www.phundament.com/
 * @copyright Copyright &copy; 2005-2010 diemeisterei GmbH
 * @license http://www.phundament.com/license/
 */

/**
 * Behavior, handles file uploads
 * 
 * Note: This behavior currently requires a set of fixed attribute names within
 * the model (path, mimeType, title, size, originalName, md5).
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @package p3extensions.behaviors
 * @since 3.0.1
 */

Yii::setPathOfAlias('p3extensions-helpers',dirname(__FILE__).'/../helpers/');
Yii::import('p3extensions-helpers.*');

class PhFileUploadBehavior extends CActiveRecordBehavior {
	const TRASH_FOLDER = 'trash';

	public $uploadInstance;
	/**
	 * Yii path alias, where to store files
	 * @var type string
	 */
	public $dataAlias;
	/**
	 * Subdirectory for uploaded files (e.g. user directories)
	 * @var type string
	 */
	public $dataSubdirectory;
	/**
	 * Yii path alias, where to move delted files
	 * @var type string
	 */
	public $trashAlias;
	
	private $_baseDataPath;
	private $_fullDataPath;
	private $_relativeDataPath;
	private $_trashPath;
	private $_fileToDelete;

	/**
	 * Stores file in appropriate directory and updates owner record with info
	 * about the file.
	 * 
	 * @param type $event 
	 */
	public function afterValidate($event) {

		$this->prepareDataDirectory();
		$file = CUploadedFile::getInstanceByName($this->uploadInstance);

		if ($file instanceof CUploadedFile && $file->getError() == UPLOAD_ERR_OK && !$this->Owner->hasErrors()) {

			$uniqueFilename = $this->generateUniqueFilename($file->getName());
			$fullFilePath = $this->_fullDataPath . DIRECTORY_SEPARATOR . $uniqueFilename;
			$relativeFilePath = $this->_relativeDataPath . DIRECTORY_SEPARATOR . $uniqueFilename;

			if ($file->saveAs($fullFilePath)) {
				#echo $fullFilePath;exit;
				if (!$this->Owner->isNewRecord) {
					$this->deleteFile($this->Owner->path);
				}
				if (!$this->Owner->title) {
					$this->Owner->title = $this->cleanName($file->name,32);
				}
				$this->Owner->path = $relativeFilePath;
				$this->Owner->mime_type = $file->type;
				$this->Owner->size = $file->size;
				$this->Owner->original_name = $file->name;
				$this->Owner->hash = md5_file($fullFilePath);
			} else {
				$this->Owner->addError('filePath', 'File uploaded failed!');
			}
		} else {
			if ($this->Owner->isNewRecord) {
				#$this->Owner->addError('filePath', 'No file uploaded!');
				Yii::trace('No file uploaded!');
			}
		}
	}
	
	public function beforeDelete($event) {
		$this->_fileToDelete = $this->Owner->path;
	}

	public function afterDelete($event) {
		$this->prepareDataDirectory();
		$this->deleteFile($this->_fileToDelete);
	}

    private static function cleanName($name, $maxLength = 0) {
        $name = preg_replace("/[^.A-Za-z0-9_-]/", "", $name);
        if ($maxLength > 0 && strlen($name) > $maxLength) {
            $name = substr($name, 0, $maxLength / 2 - 2) . ".." . substr($name, strlen($name) - $maxLength / 2 + 1);
        }
        return $name;
    }

    private static function generateUniqueFilename($path) {
        $pathinfo = pathinfo($path);
        return $pathinfo['filename'] . uniqid('-') . '.' . $pathinfo['extension'];
    }
	
	private function deleteFile($path) {
		$fileToDelete = $this->_baseDataPath . DIRECTORY_SEPARATOR . $path;
		if (is_file($fileToDelete)) {
			if (!rename($fileToDelete, $this->_trashPath . DIRECTORY_SEPARATOR . basename($path))) {
				Yii::log("Error while moving file '" . $path . "' to trash.", CLogger::LEVEL_WARNING);
			} else {
				Yii::log("Moved file '" . $path . "' to trash.", CLogger::LEVEL_INFO);
			}
		} else {
			Yii::log("Error file '" . $path . "' could not be deleted. File not found.", CLogger::LEVEL_WARNING);
		}
	}
	
	private function prepareDataDirectory() {
		$this->_baseDataPath = Yii::getPathOfAlias($this->dataAlias);
		$this->_fullDataPath = Yii::getPathOfAlias($this->dataAlias) . DIRECTORY_SEPARATOR . $this->dataSubdirectory;
		$this->_relativeDataPath = $this->dataSubdirectory;
		if (!is_dir($this->_fullDataPath)) {
			mkdir($this->_fullDataPath);
			chmod($this->_fullDataPath, 0777);
		}

		$this->_trashPath = Yii::getPathOfAlias($this->trashAlias);
		if (!is_dir($this->_trashPath)) {
			mkdir($this->_trashPath);
			chmod($this->_trashPath, 0777);
		}
	}


}

?>
