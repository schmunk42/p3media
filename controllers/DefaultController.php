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
				'actions' => array('index', 'ckeditortest', 'tree', 'manager', 'ajaxDirectory'),
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

    public function actionTree() {
		$this->render('tree');
	}

    public function actionManager() {
        //Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(dirname(__FILE__).DIRECTORY_SEPARATOR.'Default.js'));

        $url = $this->createUrl('ajaxDirectory');
        $script = "$.ajax('{$url}',{
            dataType: 'json',
            success: function(data){
                console.log(data);
                var elem = '.root-dir';
                var ul = $('<ul>').appendTo(elem);
                $(data).each(function(i, row){
                    $('<li><a href=\"?treeParent_id='+row.id+'\">'+row.title+'</a></li>').appendTo(ul);
                });
                $('</ul>').appendTo(elem);
            }
        })";
        Yii::app()->clientScript->registerScript('manager', $script);

        $model = new P3Media;
        if (isset($_GET['treeParent_id'])) {
            $model->treeParent = $_GET['treeParent_id'];
        } else {
            $model->treeParent = null;
        }
        $this->render('manager', array('model'=>$model));
    }

    public function actionAjaxDirectory(){
        $criteria = new CDbCriteria();
        $criteria->condition = "t.type = ".P3Media::TYPE_FOLDER." AND metaData.treeParent_id IS NULL";
        $models = P3Media::model()->with('metaData')->findAll($criteria);
        #var_dump($models);exit;
        echo CJSON::encode($models);
    }

	public function actionCkeditortest() {
		$this->render('Ckeditortest');
	}

}