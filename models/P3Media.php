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
        $metaDataBehavior = array(
            'class'            => 'P3MetaDataBehavior',
            'metaDataRelation' => 'metaData',
            'parentRelation'   => 'treeParent',
            'childrenRelation' => 'p3MediaMetas',
            'contentRelation'  => 'id0',
            'defaultLanguage'  => (Yii::app()->params['P3Media.defaultLanguage']) ?
                Yii::app()->params['P3Media.defaultLanguage'] : P3MetaDataBehavior::ALL_LANGUAGES,
            'defaultStatus'    => (Yii::app()->params['P3Media.defaultStatus']) ?
                Yii::app()->params['P3Media.defaultStatus'] : P3MetaDataBehavior::STATUS_ACTIVE,
        );

        // exist in console app - no upload behaviour (TODO - review)
        if (Yii::app() instanceof CConsoleApplication) {
            $return = array_merge(
                array(
                     'MetaData' => $metaDataBehavior,
                ),
                parent::behaviors()
            );
        } else {
            $return = array_merge(
                array(
                     'UploadBehaviour' => array(
                         'class'            => 'P3FileUploadBehavior',
                         'dataAlias'        => Yii::app()->getModule('p3media')->dataAlias,
                         'trashAlias'       => Yii::app()->getModule('p3media')->dataAlias . ".trash",
                         'dataSubdirectory' => Yii::app()->user->id,
                         'uploadInstance'   => 'fileUpload',
                     ),
                     'MetaData'        => $metaDataBehavior
                ),
                parent::behaviors()
            );
        }

        return $return;
    }

    public function search()
    {
        $criteria = new CDbCriteria;
        $criteria->with = 'metaData';

        if ($this->treeParent == "_ROOT") {
            $criteria->addCondition('metaData.treeParent_id IS NULL');
        }
        elseif ($this->treeParent !== null) {
            $criteria->compare('metaData.treeParent_id', $this->treeParent, true);
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
        $criteria->compare('nameId', $this->nameId, true);

        #var_dump($this->treeParent);exit;
        #$criteria->compare('info', $this->info, true);
        return new CActiveDataProvider(
            get_class($this),
            array(
                 'criteria' => $criteria,
                 'sort' => array(
                     'defaultOrder' => 't.id DESC',
                 ),
            ));
    }

    public function image($preset = null)
    {
        return CHtml::image(
            $this->createUrl($preset), $this->title);
    }

    public function createUrl($preset = null)
    {
        return Yii::app()->controller->createUrl(
            '/p3media/file/image',
            array(
                 'id' => $this->id,
                 'preset' => $preset,
                 'title'=>$this->title,
                 'extension'=>'.'.Yii::app()->getModule('p3media')->params['presets'][$preset]['type']
            )
        );
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
