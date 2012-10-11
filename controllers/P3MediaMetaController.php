<?php

class P3MediaMetaController extends Controller
{
    #public $layout='//layouts/column2';
    public $defaultAction = "admin";
    public $scenario = "crud";

public function filters() {
	return array(
			'accessControl',
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('create','update','ajaxUpdate','delete','admin','view'),
				'roles'=>array('P3media.P3MediaMeta.*'),
				),
			array('deny',
				'users'=>array('*'),
				),
			);
}

    public function beforeAction($action){
        parent::beforeAction($action);
        // map identifcationColumn to id
        if (!isset($_GET['id']) && isset($_GET['id'])) {
            $model=P3MediaMeta::model()->find('id = :id', array(
            ':id' => $_GET['id']));
            if ($model !== null) {
                $_GET['id'] = $model->id;
            } else {
                throw new CHttpException(400);
            }
        }
        if ($this->module !== null) {
            $this->breadcrumbs[$this->module->Id] = array('/'.$this->module->Id);
        }
        return true;
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id);
        $this->render('view',array(
            'model' => $model,
        ));
    }

    public function actionCreate()
    {
        $model = new P3MediaMeta;
        $model->scenario = $this->scenario;

                $this->performAjaxValidation($model, 'p3-media-meta-form');
    
        if(isset($_POST['P3MediaMeta'])) {
            $model->attributes = $_POST['P3MediaMeta'];

            try {
                if($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view','id'=>$model->id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('id', $e->getMessage());
            }
        } elseif(isset($_GET['P3MediaMeta'])) {
                $model->attributes = $_GET['P3MediaMeta'];
        }

        $this->render('create',array( 'model'=>$model));
    }


    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

                $this->performAjaxValidation($model, 'p3-media-meta-form');
        
        if(isset($_POST['P3MediaMeta']))
        {
            $model->attributes = $_POST['P3MediaMeta'];


            try {
                if($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view','id'=>$model->id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('id', $e->getMessage());
            }
        }

        $this->render('update',array(
                    'model'=>$model,
                    ));
    }

    public function actionAjaxUpdate()
    {
        Yii::import('EditableSaver'); //or you can add import 'ext.editable.*' to config
        $es = new EditableSaver('P3MediaMeta');  // 'User' is classname of model to be updated
        $es->update();
    }

    public function actionDelete($id)
    {
        if(Yii::app()->request->isPostRequest)
        {
            try {
                $this->loadModel($id)->delete();
            } catch (Exception $e) {
                throw new CHttpException(500,$e->getMessage());
            }

            if(!isset($_GET['ajax']))
            {
                    $this->redirect(array('admin'));
            }
        }
        else
            throw new CHttpException(400,
                    Yii::t('app', 'Invalid request. Please do not repeat this request again.'));
    }

    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('P3MediaMeta');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    public function actionAdmin()
    {
        $model=new P3MediaMeta('search');
        $model->unsetAttributes();

        if(isset($_GET['P3MediaMeta']))
            $model->attributes = $_GET['P3MediaMeta'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    public function loadModel($id)
    {
        $model=P3MediaMeta::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,Yii::t('app', 'The requested page does not exist.'));
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='p3-media-meta-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
