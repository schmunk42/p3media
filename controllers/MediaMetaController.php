<?php

class MediaMetaController extends GController {

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
		$model = new MediaMeta;

		$this->performAjaxValidation($model, 'media-meta-form');

		if (isset($_POST['MediaMeta'])) {
			$model->attributes = $_POST['MediaMeta'];


			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		} elseif (isset($_GET['MediaMeta'])) {
			$model->attributes = $_GET['MediaMeta'];
		}


		if (Yii::app()->request->isAjaxRequest)
			$this->renderPartial('_miniform', array('model' => $model, 'relation' => $_GET['relation']));
		else
			$this->render('create', array('model' => $model));
	}

	public function actionUpdate() {
		$model = $this->loadModel();

		$this->performAjaxValidation($model, 'media-meta-form');

		if (isset($_POST['MediaMeta'])) {
			$model->attributes = $_POST['MediaMeta'];


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
		$dataProvider = new CActiveDataProvider('MediaMeta');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new MediaMeta('search');
		$model->unsetAttributes();

		if (isset($_GET['MediaMeta']))
			$model->attributes = $_GET['MediaMeta'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
