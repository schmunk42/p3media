<?php

class DefaultController extends Controller
{

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
				'actions'=>array('index'),
				'expression' => 'Yii::app()->user->checkAccess("P3media.Default.*")||YII_DEBUG',
				),
			array('deny',
				'users'=>array('*'),
				),
			);
}
	public function actionIndex()
	{
		$this->render('index');
	}


}