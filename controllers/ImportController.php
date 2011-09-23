<?php

Yii::import('ext.p3extensions.widgets.jquery-file-upload.*');

class ImportController extends Controller {
	
	
	
	public function filters() {
		return array(
			'accessControl',
		);
	}

	public function accessRules() {
		return array(
			array('allow',
				'actions' => array('upload', 'uploadFile'),
				'roles' => array('P3Media.User'),
			),
			array('allow',
				'actions' => array('index', 'check', 'localFile', 'scan'),
				'users' => array('admin'),
				'roles' => array('P3Media.Admin'),
			),
			array('deny',
				'users' => array('*'),
			),
		);
	}

	public $breadcrumbs = array(
		'P3 Media' => array('/p3media')
	);

	public function init() {
		parent::init();
		#$this->module->getDataPath(true);
	}

	public function actionIndex() {
		$this->render('index');
	}

	public function actionUpload() {
		$this->render('upload');
	}

	public function actionUploadFile() {
		$contents = $this->uploadHandler();
		echo $contents;
		exit;
		#echo CJSON::encode($result);
	}
	
	private function uploadHandler(){
		#$script_dir = Yii::app()->basePath.'/data/p3media';
		#$script_dir_url = Yii::app()->baseUrl;
		$options = array(
			'upload_dir' => $this->module->getDataPath() . DIRECTORY_SEPARATOR,
			'upload_url' => $this->createUrl("/p3media/p3Media/update",array('preset'=>'raw','path'=>urlencode(Yii::app()->user->id."/"))),
			'field_name' => 'files',
			'image_versions' => array(
                // Uncomment the following version to restrict the size of
                // uploaded images. You can also add additional versions with
                // their own upload directories:
                /*
                'large' => array(
                    'upload_dir' => dirname(__FILE__).'/files/',
                    'upload_url' => dirname($_SERVER['PHP_SELF']).'/files/',
                    'max_width' => 1920,
                    'max_height' => 1200
                ),
                */
                'thumbnail' => array(
                    #'upload_dir' => dirname(__FILE__).'/thumbnails/',
                    'upload_url' => $this->createUrl("/p3media/file/image",array('preset'=>'thumb','path'=>urlencode(Yii::app()->user->id."/"))),
                    'max_width' => 80,
                    'max_height' => 80
                )
            )

		);

		// wrapper for jQuery-file-upload/upload.php
		$upload_handler = new UploadHandler($options);
		header('Pragma: no-cache');
		header('Cache-Control: private, no-cache');
		header('Content-Disposition: inline; filename="files.json"');
		header('X-Content-Type-Options: nosniff');

		ob_start();
		switch ($_SERVER['REQUEST_METHOD']) {
			case 'HEAD':
			case 'GET':
				$upload_handler->get();
				$contents = ob_get_contents();
				break;
			case 'POST':
				// check if file exists
				$upload = $_FILES[$options['field_name']];
				$tmp_name = $_FILES[$options['field_name']]['tmp_name'];
				if (is_array($tmp_name))
				foreach ($tmp_name AS $index => $value){
					$model = P3Media::model()->findByAttributes(array('path' => Yii::app()->user->id.DIRECTORY_SEPARATOR.$upload['name'][$index]));
					if ($model !== null) {
						#throw new CHttpException(500, 'File exists.');
						$file = new stdClass();
						$file->error = "File with same name already exists.";
						$info[] = $file;
						echo CJSON::encode($info);
						exit;
					}
				}
				
				$upload_handler->post();
				$contents = ob_get_contents();
				$result = CJSON::decode($contents);
				#var_dump($result);exit;
				$this->createMedia($result[0]['name'], $this->module->getDataPath(true).DIRECTORY_SEPARATOR.$result[0]['name']);
				break;
			case 'DELETE':
				$upload_handler->delete();
				$contents = ob_get_contents();
				$result = $this->deleteMedia($_GET['file']);
				break;
			default:
				header('HTTP/1.0 405 Method Not Allowed');
				$contents = ob_get_contents();
		}
		ob_end_clean();
		
		return $contents;
	}

	public function actionScan() {
		$dir = Yii::getPathOfAlias($this->module->importAlias);
		$files = array();
		foreach (scandir($dir, 0) AS $fileName) {
			$filePath = $dir . DIRECTORY_SEPARATOR . $fileName;
			if (substr($fileName, 0, 1) == ".")
				continue;
			if (is_dir($filePath))
				continue;
			#$md5 = md5_file($filePath);
			$files[] = new CAttributeCollection(array(
					'name' => $fileName,
					'path' => $filePath,
					'id' => md5($fileName),
				));
		}
		$this->render('scan', array('files' => $files));
	}

	public function actionCheck() {
		$warnings = null;
		$result = null;
		$message = null;

		$fileName = $_GET['fileName'];

		$filePath = realpath(Yii::getPathOfAlias($this->module->importAlias) . DIRECTORY_SEPARATOR . $fileName);

		if (is_file($filePath) && strstr($filePath, realpath(Yii::getPathOfAlias($this->module->importAlias)))) {
			$md5 = md5_file($filePath);
			$result['md5'] = $md5;
			if (P3Media::model()->findByAttributes(array('md5' => $md5)) !== null) {
				$message .= $warnings[] = "Identical file exists";
				$message .= "<br/>";
			}
			if (P3Media::model()->findByAttributes(array('originalName' => $fileName)) !== null) {
				$message .= $warnings[] = "File with same name exists";
				$message .= "<br/>";
			}

			if (count($warnings) == 0)
				$message .= "OK";
		} else {
			$warnings[] = "File not found";
		}

		$result['errors'] = $warnings;
		$result['message'] = $message;
		echo CJSON::encode($result);
	}

	public function actionLocalFile() {

		if ($this->module->resolveFilePath($_GET['fileName'])) {

			$fileName = $_GET['fileName'];
			$importFilePath = $this->module->resolveFilePath($_GET['fileName']);

			$dataFilePath = Yii::app()->user->id.DIRECTORY_SEPARATOR.$fileName;
			copy($importFilePath, Yii::getPathOfAlias($this->module->dataAlias) . DIRECTORY_SEPARATOR . $dataFilePath);

			echo CJSON::encode($this->createMedia($fileName, $dataFilePath));
		} else {
			throw new CHttpException(500, 'File not found');
		}
	}

	private function createMedia($fileName, $filePath) {
		$fullFilePath = Yii::getPathOfAlias($this->module->dataAlias) . DIRECTORY_SEPARATOR . $filePath;
		$md5 = md5_file($fullFilePath);
		$getimagesize = getimagesize($fullFilePath);

		$model = new P3Media;
		$model->detachBehavior('Upload');
		
		$model->title = P3StringHelper::cleanName($fileName, 32);
		$model->originalName = $fileName;

		$model->type = 1; //P3Media::TYPE_FILE;
		$model->path = $filePath;
		$model->md5 = $md5;
		if (!$mime = exec("file -bI " . escapeshellarg($fullFilePath))) {
			$mime = $getimagesize['mime'];
		}
		$model->mimeType = $mime;
		$model->info = CJSON::encode(getimagesize($fullFilePath));
		$model->size = filesize($fullFilePath);

		if ($model->save()) {
			return $model->attributes;
		} else {
			$errorMessage = "";
			foreach ($model->errors AS $attrErrors) {
				$errorMessage .= implode(',', $attrErrors);
			}
			throw new CHttpException(500, $errorMessage);
		}
	}
	
	private function deleteMedia($fileName) {
		$attributes['path'] = $this->module->getDataPath(true) . DIRECTORY_SEPARATOR . $fileName;
		$model = P3Media::model()->findByAttributes($attributes);
		#unlink($this->getDataPath(true) . DIRECTORY_SEPARATOR . $fileName);
		$model->delete();
		return true;
	}
	
	private function findMd5($md5) {
		$model = P3Media::model()->findByAttributes(array('md5' => $md5));
		if ($model === null)
			return false;
		else
			return true;
	}


	


	// -----------------------------------------------------------
	// Uncomment the following methods and override them if needed
	/*
	  public function filters()
	  {
	  // return the filter configuration for this controller, e.g.:
	  return array(
	  'inlineFilterName',
	  array(
	  'class'=>'path.to.FilterClass',
	  'propertyName'=>'propertyValue',
	  ),
	  );
	  }

	  public function actions()
	  {
	  // return external action classes, e.g.:
	  return array(
	  'action1'=>'path.to.ActionClass',
	  'action2'=>array(
	  'class'=>'path.to.AnotherActionClass',
	  'propertyName'=>'propertyValue',
	  ),
	  );
	  }
	 */
}