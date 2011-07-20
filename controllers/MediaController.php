<?php

class MediaController extends GController {

	public $layout = '//layouts/column2';

	public function filters() {
		return array(
			'accessControl',
		);
	}

	public function accessRules() {
		return array(
			array('allow',
				'actions' => array('admin', 'delete', 'getOptions', 'create', 'update', 'view', 'index'),
				'users' => array('admin'),
			),
			array('deny',
				'users' => array('*'),
			),
		);
	}

	public function actionView() {
		$this->render('view', array(
			'model' => $this->loadModel(),
		));
	}

	public function actionCreate() {
		$model = new Media;

		$this->performAjaxValidation($model, 'media-form');

		if (isset($_POST['Media'])) {
			$model->attributes = $_POST['Media'];


			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		} elseif (isset($_GET['Media'])) {
			$model->attributes = $_GET['Media'];
		}


		if (Yii::app()->request->isAjaxRequest)
			$this->renderPartial('_miniform', array('model' => $model, 'relation' => $_GET['relation']));
		else
			$this->render('create', array('model' => $model));
	}

	public function actionUpdate() {
		$model = $this->loadModel();

		$this->performAjaxValidation($model, 'media-form');

		if (isset($_POST['Media'])) {
			$model->attributes = $_POST['Media'];


			if ($model->save()) {

				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	public function actionDelete() {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel()->delete();

			if (!isset($_GET['ajax'])) {
				if (isset($_POST['returnUrl']))
					$this->redirect($_POST['returnUrl']);
				else
					$this->redirect(array('admin'));
			}
		}
		else
			throw new CHttpException(400,
				Yii::t('app', 'Invalid request. Please do not repeat this request again.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Media');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Media('search');
		$model->unsetAttributes();

		if (isset($_GET['Media']))
			$model->attributes = $_GET['Media'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
