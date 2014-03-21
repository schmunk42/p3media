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
 * Controller handling file output
 *
 * Detail description
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @package p3media.controllers
 * @since 3.0.1
 */
class FileController extends Controller {

	/**
	 * Imports {@link P3MediaImageAction}, available as /p3media/file/image.
	 *
	 * @return array
	 */
	public function actions() {
		return array(
			'image' => array(
				'class' => 'p3media.actions.P3MediaImageAction',
			),
		);
	}

	public function beforeAction($action) {
		parent::beforeAction($action);
		if (isset($_GET['path'])) {
			$model = P3Media::model()->findByAttributes(array('path' => urldecode($_GET['path'])));
            
            switch(true) {
                case ($model !== null):
                    $_GET['id'] = $model->id;
                    break;
                case (!$model->isReadable):
                    throw new CHttpException(405, 'Access denied.');
                    break;
                default :
                    $_GET['id'] = 0;
                    break;
            }

		}
		return true;
	}

	/**
	 * Return file as inline attachment, uses $_GET['id'] as input param.
	 */
	public function actionIndex() {
		#$this->render('index');
		if (!$_GET['id']) {
			throw new CHttpException(404, 'No file specified.');
		} else {
			$model = P3Media::model()->findByPk($_GET['id']);
			$filename = Yii::getPathOfAlias($this->module->dataAlias) . DIRECTORY_SEPARATOR . $model->path;
			
            switch(true) {
                case (!is_file($filename)):
                    throw new CHttpException(404, 'File not found.');
                    break;
                case (!$model->isReadable):
                    throw new CHttpException(403, 'Access denied.');
                    break;
                default :
                    header('Content-Disposition: attachment; filename="' . $model->title . '"');
                    header('Content-type: ' . $model->mime_type);

                    readfile($filename);
                    exit;
            }

		}
	}
}
