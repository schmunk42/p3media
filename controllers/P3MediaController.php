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
				'actions'=>array('admin','delete','index','view','create','update'),
				'expression' => 'Yii::app()->user->checkAccess("P3media.P3Media.*")||YII_DEBUG',
			),
			array('deny',  
				'users'=>array('*'),
			),
		);
	}
	
	public function beforeAction($action){
		parent::beforeAction($action);
		// map identifcationColumn to id
		if (!isset($_GET['id']) && isset($_GET['path'])) {
			$model=P3Media::model()->find('path = :path', array(
			':path' => $_GET['path']));
			if ($model !== null) {
				$_GET['id'] = $model->id;
			} else {
				throw new CHttpException(400);
			}
		}
		if ($this->module !== null) {
			$this->breadcrumbs[$this->module->Id] = array('/'.$this->module->Id);
		}
		return true;
	}
	
	public function actionView($id)
	{
		$model = $this->loadModel($id);
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
        			$this->redirect(array('view','id'=>$model->id));
				}
			} catch (Exception $e) {
				$model->addError('path', $e->getMessage());
			}
		} elseif(isset($_GET['P3Media'])) {
				$model->attributes = $_GET['P3Media'];
		}

		$this->render('create',array( 'model'=>$model));
	}


	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

				$this->performAjaxValidation($model, 'p3-media-form');
		
		if(isset($_POST['P3Media']))
		{
			$model->attributes = $_POST['P3Media'];


			try {
    			if($model->save()) {
        			$this->redirect(array('view','id'=>$model->id));
        		}
			} catch (Exception $e) {
				$model->addError('path', $e->getMessage());
			}	
		}

		$this->render('update',array(
					'model'=>$model,
					));
	}

	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			try {
				$this->loadModel($id)->delete();
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

	public function loadModel($id)
	{
		$model=P3Media::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,Yii::t('app', 'The requested page does not exist.'));
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
