<?php

class P3MediaController extends Controller
{
    #public $layout='//layouts/column2';
    public $defaultAction = "admin";
    public $scenario = "crud";

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
                  'actions' => array('create', 'update', 'delete', 'admin', 'view', 'ajaxUpdate', 'ajaxSearch'),
                  'roles'   => array('P3media.P3Media.*'),
            ),
            array('deny',
                  'users' => array('*'),
            ),
        );
    }

    public function beforeAction($action)
    {
        parent::beforeAction($action);
        // map identifcationColumn to id
        if (!isset($_GET['id']) && isset($_GET['path'])) {
            $model = P3Media::model()->find('path = :path', array(
                                                                 ':path' => $_GET['path']));
            if ($model !== null) {
                $_GET['id'] = $model->id;
            }
            else {
                throw new CHttpException(400);
            }
        }
        if ($this->module !== null) {
            $this->breadcrumbs[$this->module->Id] = array('/' . $this->module->Id);
        }

        return true;
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id);
        $this->render('view', array('model' => $model,));
    }

    public function actionCreate()
    {
        $model           = new P3Media;
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'p3-media-form');

        if (isset($_POST['P3Media'])) {
            $model->attributes = $_POST['P3Media'];

            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    }
                    else {
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('path', $e->getMessage());
            }
        }
        elseif (isset($_GET['P3Media'])) {
            $model->attributes = $_GET['P3Media'];
        }

        $this->render('create', array('model' => $model));
    }


    public function actionUpdate($id)
    {
        $model           = $this->loadModel($id);
        $model->scenario = $this->scenario;

        $this->performAjaxValidation($model, 'p3-media-form');

        if (isset($_POST['P3Media'])) {
            $model->attributes = $_POST['P3Media'];


            try {
                if ($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    }
                    else {
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('path', $e->getMessage());
            }
        }

        $this->render('update', array('model' => $model,));
    }

    public function actionAjaxUpdate()
    {
        Yii::import('EditableSaver'); //or you can add import 'ext.editable.*' to config
        $es = new EditableSaver('P3Media'); // classname of model to be updated
        $es->update();
    }

    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {


            try {
                $this->loadModel($id)->delete();
            } catch (Exception $e) {
                throw new CHttpException(500, $e->getMessage());
            }

            if (!isset($_GET['ajax'])) {
                if (isset($_GET['returnUrl']) && !empty($_GET['returnUrl'])) {
                    $this->redirect($_GET['returnUrl']);
                }
                else {
                    $this->redirect(array('admin'));
                }
            }
        }
        else {
            throw new CHttpException(400, Yii::t('app', 'Invalid request. Please do not repeat this request again.'));
        }
    }

    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('P3Media');
        $this->render('index', array('dataProvider' => $dataProvider,));
    }

    public function actionAdmin()
    {
        $model = new P3Media('search');
        $model->unsetAttributes();

        if (isset($_GET['P3Media'])) {
            $model->attributes = $_GET['P3Media'];
        }

        $this->render('admin', array('model' => $model,));
    }

    public function actionAjaxSearch()
    {
        $model        = new P3Media('search');
        $model->title = $_GET['q'];
        $result       = array();
        foreach ($model->search()->getData() AS $data) {
            $result[] = array(
                'id'    => $data->id,
                'title' => $data->title,
                'image' => $data->image('p3media-upload')
            );
        }
        echo $_GET['callback'] . "(";
        echo CJSON::encode($result);
        echo ")";
    }

    public function loadModel($id)
    {
        $model = P3Media::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        }

        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'p3-media-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
