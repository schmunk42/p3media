<?php
/**
 * Class file.
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @link http://www.phundament.com/
 * @copyright Copyright &copy; 2005-2011 diemeisterei GmbH
 * @license http://www.phundament.com/license/
 */

/**
 * Module class
 * 
 * @author Tobias Munk <schmunk@usrbin.de>
 * @package p3media
 * @since 3.0.1
 */
class P3MediaModule extends CWebModule
{
	public $dataAlias = "application.data.p3media";
	public $importAlias = "application.data.p3media-import";

	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'p3media.models.*',
			'p3media.components.*',
			'ext.phundament.p3extensions.helpers.*',
		));
		
		if (!is_writable(Yii::getPathOfAlias($this->dataAlias))) {
			throw new CHttpException(500, "Directory with alias '{$this->dataAlias}' not writable.");
		} 
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
	
	public function getDataPath($relative = false){		
		
		$relativeDataPath = Yii::app()->user->id;
		$fullDataPath = Yii::getPathOfAlias($this->dataAlias) . DIRECTORY_SEPARATOR . $relativeDataPath;
		
		if (!is_dir($fullDataPath)) {
			mkdir($fullDataPath);
			chmod($fullDataPath, 0777); // problems when doing this with mkdir
		}

		if ($relative === false)
			return $fullDataPath;
		else
			return $relativeDataPath;
	}
	
	/*public function generateUniqueFileName($fileName) {
		$ext = strrchr($fileName, '.');
		return Yii::app()->user->id . DIRECTORY_SEPARATOR . uniqid($fileName . "-") . $ext;
	}*/
	
	public function resolveFilePath($fileName) {
		$filePath = realpath(Yii::getPathOfAlias($this->importAlias) . DIRECTORY_SEPARATOR . $fileName);
		if (is_file($filePath) && strstr($filePath, realpath(Yii::getPathOfAlias($this->importAlias)))) {
			return $filePath;
		} else {
			return false;
		}
	}
	
	
}

?>