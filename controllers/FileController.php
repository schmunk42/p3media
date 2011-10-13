<?php

class FileController extends Controller {

	public function actions() {
		return array(
			'image' => array(
				'class' => 'p3media.actions.P3MediaImageAction',
			),
		);
	}

	public function beforeAction($action) {
		parent::beforeAction($action);
		if (isset($_GET['path'])) { // TODO MetaData Access Check
			$model = P3Media::model()->findByAttributes(array('path' => urldecode($_GET['path'])));
			if ($model !== null) {
				$_GET['id'] = $model->id;
			} else {
				$_GET['id'] = 0;
				#return false;
			}
		}
		return true;
	}

	public function actionIndex() {
		#$this->render('index');
		if (!$_GET['id']) {
			throw new CException('No file specified.');
		} else {
			$model = P3Media::model()->findByPk($_GET['id']);
			$filename = Yii::getPathOfAlias($this->module->dataAlias) . DIRECTORY_SEPARATOR . $model->path;
			if (!is_file($filename)) {
				throw new CException('File not found.');
			} else {
				header('Content-Disposition: attachment; filename="' . $model->title . '"');
				header('Content-type: ' . $model->mimeType);
				readfile($filename);
				exit;
			}
		}
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