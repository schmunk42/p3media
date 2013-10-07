<?php

// auto-loading
Yii::setPathOfAlias('P3Media', dirname(__FILE__));
Yii::import('P3Media.*');

Yii::setPathOfAlias('P3MediaModule', dirname(__FILE__).DIRECTORY_SEPARATOR.'..');
Yii::import('P3MediaModule.behaviors.*');

class P3Media extends BaseP3Media
{
    const TYPE_FILE   = 'file';
    const TYPE_FOLDER = 'directory';

    /**
     * @var string default status
     */
    public $status = 'draft';

    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        return parent::init();
    }

    public function getItemLabel()
    {
        return parent::getItemLabel();
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array(
                 'Access'           => array(
                     'class' => '\PhAccessBehavior'
                 ),
                 'AdjacencyList'    => array(
                     'class'            => '\AdjacencyListBehavior',
                     'parentAttribute'  => 'tree_parent_id',
                     'parentRelation'   => 'treeParent',
                     'childrenRelation' => 'p3Widgets'
                 ),
                 'LoggableBehavior' => array(
                     'class'   => 'vendor.sammaye.auditrail2.behaviors.LoggableBehavior',
                     'ignored' => array(
                         'created_at',
                         'updated_at',
                     )
                 ),
                 'Status'           => array(
                     'class'       => 'vendor.yiiext.status-behavior.EStatusBehavior',
                     'statusField' => 'status'
                 ),
                 'Timestamp'        => array(
                     'class'               => 'zii.behaviors.CTimestampBehavior',
                     'createAttribute'     => 'created_at',
                     'updateAttribute'     => 'updated_at',
                     'setUpdateOnCreate'   => true,
                     'timestampExpression' => "date_format(date_create(),'Y-m-d H:i:s');",
                 ),
                 'Translatable'     => array(
                     'class'                 => 'vendor.mikehaertl.translatable.Translatable',
                     'translationRelation'   => 'p3MediaTranslations',
                     'translationAttributes' => array(
                         'title',
                         'description',
                     ),
                     'fallbackColumns'       => array(
                         'title'       => 'default_title',
                         'description' => 'default_description',
                     ),
                 ),
                 'UploadBehaviour'  => array(
                     'class'            => 'PhFileUploadBehavior',
                     'dataAlias'        => Yii::app()->getModule('p3media')->dataAlias,
                     'trashAlias'       => Yii::app()->getModule('p3media')->dataAlias . ".trash",
                     'dataSubdirectory' => Yii::app()->user->id,
                     'uploadInstance'   => 'fileUpload',
                 ),
            )
        );
    }

    public function rules()
    {
        return array_merge(
            parent::rules()
        /* , array(
          array('column1, column2', 'rule1'),
          array('column3', 'rule2'),
          ) */
        );
    }

    /**
     * @return array list of options
     */
    public static function optsStatus()
    {
        $model = P3Page::model();
        return array_combine($model->Status->statuses, $model->Status->statuses);
    }

    /**
     * @return array list of options

    public static function optsAccessOwner()
    {
    return self::model()->Access->getAccessOwner();
    }*/

    /**
     * @return array list of options
     */
    public static function optsAccessDomain()
    {
        return self::model()->Access->getAccessDomains();
    }

    /**
     * @return array list of options
     */
    public static function optsAccessRead()
    {
        return self::model()->Access->getAccessRoles();
    }

    /**
     * @return array list of options
     */
    public static function optsAccessUpdate()
    {
        return self::model()->Access->getAccessRoles();
    }

    /**
     * @return array list of options
     */
    public static function optsAccessDelete()
    {
        return self::model()->Access->getAccessRoles();
    }

    /**
     * @return array list of options
     */
    public static function optsAccessAppend()
    {
        return self::model()->Access->getAccessRoles();
    }


    /**
     * Returns all records with type folder in a CMenu compatible tree structure
     * @return array
     */
    public function getFolderItems()
    {
        $criteria        = new CDbCriteria();
        $criteria->order = "default_title";
        if ($this->id === null) {
            $criteria->condition = "t.type = '" . P3Media::TYPE_FOLDER . "' AND t.tree_parent_id IS NULL";
        } else {
            $criteria->condition = "t.type = '" . P3Media::TYPE_FOLDER . "' AND t.tree_parent_id = " . $this->id;
        }
        $models = P3Media::model()->findAll($criteria);

        $items = array();
        foreach ($models AS $model) {
            if ($model->getFolderItems() === array()) {
                $items[] = array('label' => $model->title, 'url' => array("", "id" => $model->id));
            } else {
                $items[] = array(
                    'label' => $model->title,
                    'url'   => array("", "id" => $model->id),
                    'items' => $model->getFolderItems()
                );
            }
        }
        return $items;
    }


    /**
     * Generates an image tag with the given preset
     *
     * @param null  $preset
     * @param array $htmlOptions
     *
     * @return string
     */
    public function image($preset = null, $htmlOptions = array())
    {
        return CHtml::image(
            $this->createUrl($preset),
            $this->title,
            $htmlOptions
        );
    }

    /**
     * Create a url to the image rendered with the given preset
     *
     * @param null $preset
     *
     * @return string
     */
    public function createUrl($preset = null)
    {
        return Yii::app()->controller->createUrl(
            '/p3media/file/image',
            array(
                 'id'        => $this->id,
                 'preset'    => $preset,
                 'title'     => $this->title,
                 'extension' => '.' . Yii::app()->getModule('p3media')->params['presets'][$preset]['type']
            )
        );
    }
}
