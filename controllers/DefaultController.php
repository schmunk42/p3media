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
                  'actions' => array('index', 'ckeditortest', 'manager', 'ajaxDirectory'),
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

    public function actionManager()
    {
        $files = new P3Media;

        // select files from folder
        if (isset($_GET['id'])) {
            $files->treeParent = $_GET['id'];
        }
        else {
            $files->treeParent = '_ROOT';
        }

        // apply search terms
        if (isset($_GET['P3Media'])) {
            $files->scenario = "search";
            $files->attributes = $_GET['P3Media'];
        }

        // select only files
        $files->type = P3Media::TYPE_FILE;

        $directories = P3Media::model()->getFolderItems();

        $criteria = new CDbCriteria();
        $criteria->condition = "id0.type = ".P3Media::TYPE_FOLDER;
        $criteria->with = 'id0';

        $this->directoriesList = CHtml::listData(P3MediaMeta::model()->findAll($criteria), 'id', 'id0.title');

        $this->render('manager', array('files' => $files, 'directories' => $directories));
    }
}