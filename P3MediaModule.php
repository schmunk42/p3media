<?php

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
		));
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
		$fullDataPath = Yii::getPathOfAlias($this->module->dataAlias) . DIRECTORY_SEPARATOR . $relativeDataPath;
		
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
		$filePath = realpath(Yii::getPathOfAlias($this->module->importAlias) . DIRECTORY_SEPARATOR . $fileName);
		if (is_file($filePath) && strstr($filePath, realpath(Yii::getPathOfAlias($this->module->importAlias)))) {
			return $filePath;
		} else {
			return false;
		}
	}
	
	
}

?>