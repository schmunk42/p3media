<?php

class P3MediaController extends Controller
{
	public $layout='//layouts/column2';

	public function filters()
	{
		return array(
			'accessControl', 
		);
	}	

	public function accessRules()
	{
		return array(
			array('allow',  
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', 
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', 
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  
				'users'=>array('*'),
			),
		);
	}

	public function actionView($path)
	{
		$model = $this->loadModel($path);
		$this->render('view',array(
			'model' => $model,
		));
	}

	public function actionCreate()
	{
		$model = new P3Media;

				$this->performAjaxValidation($model, 'p3-media-form');
    
		if(isset($_POST['P3Media'])) {
			$model->attributes = $_POST['P3Media'];

			try {
    			if($model->save()) {
        			$this->redirect(array('view','path'=>$model->path));
				}
			} catch (Exception $e) {
				throw new CHttpException(500,$e->getMessage());
			}
		} elseif(isset($_GET['P3Media'])) {
				$model->attributes = $_GET['P3Media'];
		}

		$this->render('create',array( 'model'=>$model));
	}


	public function actionUpdate($path)
	{
		$model = $this->loadModel($path);

				$this->performAjaxValidation($model, 'p3-media-form');
		
		if(isset($_POST['P3Media']))
		{
			$model->attributes = $_POST['P3Media'];


			try {
    			if($model->save()) {
        			$this->redirect(array('view','path'=>$model->path));
        		}
			} catch (Exception $e) {
				throw new CHttpException(500,$e->getMessage());
			}	
		}

		$this->render('update',array(
					'model'=>$model,
					));
	}

	public function actionDelete($path)
	{
		if(Yii::app()->request->isPostRequest)
		{
			try {
				$this->loadModel($path)->delete();
			} catch (Exception $e) {
				throw new CHttpException(500,$e->getMessage());
			}

			if(!isset($_GET['ajax']))
			{
					$this->redirect(array('admin'));
			}
		}
		else
			throw new CHttpException(400,
					Yii::t('app', 'Invalid request. Please do not repeat this request again.'));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('P3Media');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new P3Media('search');
		$model->unsetAttributes();

		if(isset($_GET['P3Media']))
			$model->attributes = $_GET['P3Media'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($path)
	{
		// TODO: is_numeric is for backward compatibility ... if the value is a number it's treated as the PK
		if (is_numeric($path)) {
			$model=P3Media::model()->findByPk($path);
		} else {
			$model=P3Media::model()->find('path = :path', array(
			':path' => $path));
		}
		if($model===null)
			throw new CHttpException(404,Yii::t('app','The requested page does not exist.'));
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='p3-media-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
