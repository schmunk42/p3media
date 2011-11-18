<?php

/**
 * Class file.
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @link http://www.phundament.com/
 * @copyright Copyright &copy; 2005-2011 diemeisterei GmbH
 * @license http://www.phundament.com/license/
 */

/**
 * Controller handling index and test view
 *
 * Detail description
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @package p3media.controllers
 * @since 3.0.1
 */
class DefaultController extends Controller {

	public function filters() {
		return array(
			'accessControl',
		);
	}

	public function accessRules() {
		return array(
			array('allow',
				'actions' => array('index', 'ckeditortest'),
				'expression' => 'Yii::app()->user->checkAccess("P3media.Default.*")||YII_DEBUG',
			),
			array('deny',
				'users' => array('*'),
			),
		);
	}

	public function actionIndex() {
		$this->render('index');
	}

	public function actionCkeditortest() {
		$this->render('Ckeditortest');
	}

}