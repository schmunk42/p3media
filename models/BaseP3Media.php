<?php

/**
 * This is the model base class for the table "p3_media".
 *
 * Columns in table "p3_media" available as properties of the model:
 * @property integer $id
 * @property string $status
 * @property string $type
 * @property string $name_id
 * @property string $default_title
 * @property string $default_description
 * @property integer $tree_parent_id
 * @property integer $tree_position
 * @property string $custom_data_json
 * @property string $original_name
 * @property string $path
 * @property string $hash
 * @property string $mime_type
 * @property integer $size
 * @property string $info_php_json
 * @property string $info_image_magick_json
 * @property string $access_owner
 * @property string $access_domain
 * @property string $access_read
 * @property string $access_update
 * @property string $access_delete
 * @property string $access_append
 * @property integer $copied_from_id
 * @property string $created_at
 * @property string $updated_at
 *
 * Relations of table "p3_media" available as properties of the model:
 * @property P3Media $treeParent
 * @property P3Media[] $p3Medias
 * @property P3MediaTranslation[] $p3MediaTranslations
 */
abstract class BaseP3Media extends CActiveRecord
{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'p3_media';
    }

    public function rules()
    {
        return array_merge(
            parent::rules(), array(
                array('status, default_title, access_owner, access_domain', 'required'),
                array('type, name_id, default_description, tree_parent_id, tree_position, custom_data_json, original_name, path, hash, mime_type, size, info_php_json, info_image_magick_json, access_read, access_update, access_delete, access_append, copied_from_id, created_at, updated_at', 'default', 'setOnEmpty' => true, 'value' => null),
                array('tree_parent_id, tree_position, size, copied_from_id', 'numerical', 'integerOnly' => true),
                array('status', 'length', 'max' => 32),
                array('type, name_id, hash, access_owner', 'length', 'max' => 64),
                array('default_title, path', 'length', 'max' => 255),
                array('original_name, mime_type', 'length', 'max' => 128),
                array('access_domain', 'length', 'max' => 8),
                array('access_read, access_update, access_delete, access_append', 'length', 'max' => 256),
                array('default_description, custom_data_json, info_php_json, info_image_magick_json, created_at, updated_at', 'safe'),
                array('id, status, type, name_id, default_title, default_description, tree_parent_id, tree_position, custom_data_json, original_name, path, hash, mime_type, size, info_php_json, info_image_magick_json, access_owner, access_domain, access_read, access_update, access_delete, access_append, copied_from_id, created_at, updated_at', 'safe', 'on' => 'search'),
            )
        );
    }

    public function getItemLabel()
    {
        return (string) $this->status;
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(), array(
                'savedRelated' => array(
                    'class' => '\GtcSaveRelationsBehavior'
                )
            )
        );
    }

    public function relations()
    {
        return array(
            'treeParent' => array(self::BELONGS_TO, 'P3Media', 'tree_parent_id'),
            'p3Medias' => array(self::HAS_MANY, 'P3Media', 'tree_parent_id'),
            'p3MediaTranslations' => array(self::HAS_MANY, 'P3MediaTranslation', 'p3_media_id'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('P3MediaModule.model', 'ID'),
            'status' => Yii::t('P3MediaModule.model', 'Status'),
            'type' => Yii::t('P3MediaModule.model', 'Type'),
            'name_id' => Yii::t('P3MediaModule.model', 'Name'),
            'default_title' => Yii::t('P3MediaModule.model', 'Default Title'),
            'default_description' => Yii::t('P3MediaModule.model', 'Default Description'),
            'tree_parent_id' => Yii::t('P3MediaModule.model', 'Tree Parent'),
            'tree_position' => Yii::t('P3MediaModule.model', 'Tree Position'),
            'custom_data_json' => Yii::t('P3MediaModule.model', 'Custom Data Json'),
            'original_name' => Yii::t('P3MediaModule.model', 'Original Name'),
            'path' => Yii::t('P3MediaModule.model', 'Path'),
            'hash' => Yii::t('P3MediaModule.model', 'Hash'),
            'mime_type' => Yii::t('P3MediaModule.model', 'Mime Type'),
            'size' => Yii::t('P3MediaModule.model', 'Size'),
            'info_php_json' => Yii::t('P3MediaModule.model', 'Info Php Json'),
            'info_image_magick_json' => Yii::t('P3MediaModule.model', 'Info Image Magick Json'),
            'access_owner' => Yii::t('P3MediaModule.model', 'Access Owner'),
            'access_domain' => Yii::t('P3MediaModule.model', 'Access Domain'),
            'access_read' => Yii::t('P3MediaModule.model', 'Access Read'),
            'access_update' => Yii::t('P3MediaModule.model', 'Access Update'),
            'access_delete' => Yii::t('P3MediaModule.model', 'Access Delete'),
            'access_append' => Yii::t('P3MediaModule.model', 'Access Append'),
            'copied_from_id' => Yii::t('P3MediaModule.model', 'Copied From'),
            'created_at' => Yii::t('P3MediaModule.model', 'Created At'),
            'updated_at' => Yii::t('P3MediaModule.model', 'Updated At'),
        );
    }



}
