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
class DefaultController extends Controller
{
    public $directoriesList;
    public $defaultAction = "browser";

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
                  'actions' => array('index', 'ckeditortest', 'browser', 'ajaxDirectory'),
                  'expression' => 'Yii::app()->user->checkAccess("P3media.Default.*")',
            ),
            array('deny',
                  'users' => array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionBrowser()
    {
        $files = new P3Media('search');
        // select files
        $files->type = P3Media::TYPE_FILE;
        $files->status = null;
        // apply search terms
        if (isset($_GET['P3Media'])) {
            $files->attributes = $_GET['P3Media'];
        }
        // select files from folder
        if (isset($_GET['id'])) {
            $files->tree_parent_id = $_GET['id'];
        }
        else {
            $files->tree_parent_id = null;
        }

        // directories
        $directories = P3Media::model()->getFolderItems();
        $criteria = new CDbCriteria();
        $criteria->condition = "t.type = '".P3Media::TYPE_FOLDER."'";
        $this->directoriesList = CHtml::listData(P3Media::model()->findAll($criteria), 'id', 'title');

        $this->render('browser', array('files' => $files, 'directories' => $directories));
    }
}