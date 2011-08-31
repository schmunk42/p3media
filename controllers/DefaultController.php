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
				'users'=>array('admin'),
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