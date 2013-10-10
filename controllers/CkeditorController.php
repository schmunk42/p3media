<?php

/**
 * Class file.
 * @author    Tobias Munk <schmunk@usrbin.de>
 * @link      http://www.phundament.com/
 * @copyright Copyright &copy; 2005-2011 diemeisterei GmbH
 * @license   http://www.phundament.com/license/
 */

/**
 * Controller handling the views for ckeditor
 * Detail description
 * @author  Tobias Munk <schmunk@usrbin.de>
 * @package p3media.controllers
 */
class CkeditorController extends Controller
{

    public $layout = "//layouts/popup";
    private $_models;

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
                  'actions'    => array('index', 'image', 'flash', 'upload'),
                  'expression' => 'Yii::app()->user->checkAccess("P3media.Ckeditor.*")',
            ),
            array('deny',
                  'users' => array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $model = new P3Media('search');
        $model->unsetAttributes();

        if (isset($_GET['P3Media'])) {
            $model->attributes = $_GET['P3Media'];
        }

        $this->render('index', array('model' => $model, 'defaultPreset' => null));
    }

    public function actionImage()
    {
        $model = new P3Media('search');
        $model->unsetAttributes();

        if (isset($_GET['P3Media'])) {
            $model->scenario   = "search";
            $model->attributes = $_GET['P3Media'];
        }

        // TODO - remove public property?, see also P3MediaController
        if (isset($_GET['P3Media']['treeParent'])) {
            $model->treeParent = $_GET['P3Media']['treeParent'];
        }

        $model->dbCriteria->order = "id DESC";

        $model->mime_type = 'image';
        $model->tree_parent_id = false; // show all images - TODO
        #$this->tree_parent_id = false; // TODO

        $this->render('index', array('model' => $model, 'defaultPreset' => null));
    }

    public function actionFlash()
    {
        $model = new P3Media('search');
        $model->unsetAttributes();
        $model->attributes = array('mimeType' => 'flash');

        $this->render('index', array('model' => $model, 'defaultPreset' => 'original'));
    }

    private function loadModel()
    {
        $criteria = new CDbCriteria();
        $criteria->addSearchCondition('mime', 'image');

        $this->_models = P3Media::model()->findAllByAttributes($criteria);
    }

}
