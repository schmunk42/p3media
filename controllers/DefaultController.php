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
				'expression' => 'Yii::app()->user->checkAccess("P3Media.Default.*")',
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