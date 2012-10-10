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
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @package p3media.models
 * @since 3.0.1
 */
class P3Media extends BaseP3Media
{

    const TYPE_FILE = 1;
    const TYPE_FOLDER = 2;

    public $treeParent;

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        return parent::init();
    }

    public function __toString()
    {
        return (string)$this->title;
    }

    public function rules()
    {
        return array_merge(
        /* array('column1, column2', 'rule'), */
            parent::rules()
        );
    }

    public function relations()
    {
        return array(
            'metaData' => array(self::HAS_ONE, 'P3MediaMeta', 'id'),
        );
    }

    public function getP3MediaMeta()
    {
        return $this->metaData;
    }

    public function get_label()
    {
        return $this->title;
    }

    public function behaviors()
    {

        // exist in console app - no upload behaviour (TODO - review)
        if (Yii::app() instanceof CConsoleApplication) {
            $return = array_merge(
                array(
                     'MetaData' => array(
                         'class' => 'P3MetaDataBehavior',
                         'metaDataRelation' => 'metaData',
                     )
                ), parent::behaviors()
            );
        }
        else {
            $return = array_merge(
                array(
                     'UploadBehaviour' => array(
                         'class' => 'P3FileUploadBehavior',
                         'dataAlias' => Yii::app()->getModule('p3media')->dataAlias,
                         'trashAlias' => Yii::app()->getModule('p3media')->dataAlias . ".trash",
                         'dataSubdirectory' => Yii::app()->user->id,
                         'uploadInstance' => 'fileUpload',
                     ),
                     'MetaData' => array(
                         'class' => 'P3MetaDataBehavior',
                         'metaDataRelation' => 'metaData',
                     )
                ), parent::behaviors()
            );
        }

        return $return;
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->with = 'metaData';

        if ($this->treeParent !== null) {
            $criteria->compare('metaData.treeParent_id', $this->treeParent, true);
        }
        else {
            $criteria->addCondition('metaData.treeParent_id IS NULL');
        }


        $criteria->compare('t.id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('t.type', $this->type);
        $criteria->compare('path', $this->path, true);
        $criteria->compare('md5', $this->md5, true);
        $criteria->compare('originalName', $this->originalName, true);
        $criteria->compare('mimeType', $this->mimeType, true);
        $criteria->compare('size', $this->size);

        #var_dump($this->treeParent);exit;
        #$criteria->compare('info', $this->info, true);
        return new CActiveDataProvider(get_class($this), array(
                                                              'criteria' => $criteria,
                                                              'sort' => array(
                                                                  'defaultOrder' => 't.id DESC',
                                                              ),
                                                              'pagination' => array(
                                                                  'pageSize' => 9
                                                              ),
                                                         ));
    }

    public function image($preset = null)
    {
        return CHtml::image(
            Yii::app()->controller->createUrl(
                '/p3media/file/image', array('id' => $this->id, 'preset' => $preset)), $this->title);
    }

    public function getFolderItems()
    {
        $criteria = new CDbCriteria();
        $criteria->order = "title";
        if ($this->id === null) {
            $criteria->condition = "t.type = " . P3Media::TYPE_FOLDER . " AND metaData.treeParent_id IS NULL";
        }
        else {
            $criteria->condition = "t.type = " . P3Media::TYPE_FOLDER . " AND metaData.treeParent_id = " . $this->id;
        }
        $models = P3Media::model()->with('metaData')->findAll($criteria);
        $items = array();
        foreach ($models AS $model) {
            if ($model->getFolderItems() === array()) {
                $items[] = array('label' => $model->title, 'url' => array("", "id" => $model->id));
            }
            else {
                $items[] = array('label' => $model->title, 'url' => array("", "id" => $model->id),
                                 'items' => $model->getFolderItems());
            }
        }
        return $items;
    }
}
