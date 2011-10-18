<?php

class CkeditorController extends Controller {

	public $layout = "//layouts/popup";
	private $_models;

	public function filters() {
		return array(
			'accessControl',
		);
	}

	public function accessRules() {
		return array(
			array('allow',
				'actions' => array('index','image','flash'),
				'expression' => 'Yii::app()->user->checkAccess("P3media.Ckeditor.*")||YII_DEBUG',
			),
			array('deny',
				'users' => array('*'),
			),
		);
	}

	public function actionIndex() {
		$model = new P3Media('search');
		$model->unsetAttributes();

		if (isset($_GET['P3Media']))
			$model->attributes = $_GET['P3Media'];

		$this->render('index', array('model' => $model));
	}

	public function actionImage() {
		$model = new P3Media('search');
		$model->unsetAttributes();
		$model->attributes = array('mimeType' => 'image');

		if (isset($_GET['P3Media']))
			$model->attributes = $_GET['P3Media'];

		$model->dbCriteria->order = "id DESC";

		$this->render('index', array('model' => $model));
	}

	public function actionFlash() {
		$this->render('index', array('model' => $model));
	}

	private function loadModel() {
		$criteria = new CDbCriteria();
		$criteria->addSearchCondition('mime', 'image');

		$this->_models = P3Media::model()->findAllByAttributes($criteria);
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