<?php

class P3MediaController extends GController
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
				'actions'=>array('index', 'view', 'getOptions'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create', 'update', 'admin', 'delete'),
				'users'=>array('admin'),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

		public function actionView()
	{
		$this->render('view',array(
			'model' => $this->loadModel(),
		));
	}

	public function actionCreate()
	{
		$model = new P3Media;

				$this->performAjaxValidation($model, 'p3-media-form');
    
		if(isset($_POST['P3Media'])) {
			$model->attributes = $_POST['P3Media'];


			if($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}			
		} elseif(isset($_GET['P3Media'])) {
				$model->attributes = $_GET['P3Media'];
		}


		if(Yii::app()->request->isAjaxRequest)
			$this->renderPartial('_miniform',array( 'model'=>$model, 'relation' => $_GET['relation']));
		else
			$this->render('create',array( 'model'=>$model));
	}


	public function actionUpdate()
	{
		$model = $this->loadModel();

				$this->performAjaxValidation($model, 'p3-media-form');
		
		if(isset($_POST['P3Media']))
		{
			$model->attributes = $_POST['P3Media'];


			if($model->save()) {

      $this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
					'model'=>$model,
					));
	}

	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			$this->loadModel()->delete();

			if(!isset($_GET['ajax']))
			{
				if(isset($_POST['returnUrl']))
					$this->redirect($_POST['returnUrl']); 
				else
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

}
