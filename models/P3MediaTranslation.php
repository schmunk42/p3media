<?php

// auto-loading
Yii::setPathOfAlias('P3MediaTranslation', dirname(__FILE__));
Yii::import('P3MediaTranslation.*');

class P3MediaTranslation extends BaseP3MediaTranslation
{

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
        return $this->language;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array(
                 'Access'           => array(
                     'class' => '\PhAccessBehavior'
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

    public function getStatusCssClass()
    {
        $key = ($this->isNewRecord) ? 'new' : $this->getAttribute('status');
        return $this->_statusCssClassMap[$key];
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
    public static function optsLanguage()
    {
        return (array) Yii::app()->params['languages'];
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
}
