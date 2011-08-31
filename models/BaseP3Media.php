<?php

/**
 * This is the model base class for the table "p3_media".
 *
 * Columns in table "p3_media" available as properties of the model:
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property string $description
 * @property string $type
 * @property string $path
 * @property string $md5
 * @property string $originalName
 * @property string $mimeType
 * @property integer $size
 * @property string $info
 *
 * Relations of table "p3_media" available as properties of the model:
 * @property P3Media $parent
 * @property P3Media[] $p3Medias
 * @property P3MediaMeta $p3MediaMeta
 */
abstract class BaseP3Media extends GActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'p3_media';
	}

	public function rules()
	{
		return array(
			array('path, md5', 'required'),
			array('parent_id, title, description, type, originalName, mimeType, size, info', 'default', 'setOnEmpty' => true, 'value' => null),
			array('parent_id, size', 'numerical', 'integerOnly'=>true),
			array('title, md5', 'length', 'max'=>32),
			array('type', 'length', 'max'=>45),
			array('path', 'length', 'max'=>255),
			array('originalName', 'length', 'max'=>128),
			array('mimeType', 'length', 'max'=>64),
			array('description, info', 'safe'),
			array('id, parent_id, title, description, type, path, md5, originalName, mimeType, size, info', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'parent' => array(self::BELONGS_TO, 'P3Media', 'parent_id'),
			'p3Medias' => array(self::HAS_MANY, 'P3Media', 'parent_id'),
			'p3MediaMeta' => array(self::HAS_ONE, 'P3MediaMeta', 'id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app', 'ID'),
			'parent_id' => Yii::t('app', 'Parent'),
			'title' => Yii::t('app', 'Title'),
			'description' => Yii::t('app', 'Description'),
			'type' => Yii::t('app', 'Type'),
			'path' => Yii::t('app', 'Path'),
			'md5' => Yii::t('app', 'Md5'),
			'originalName' => Yii::t('app', 'Original Name'),
			'mimeType' => Yii::t('app', 'Mime Type'),
			'size' => Yii::t('app', 'Size'),
			'info' => Yii::t('app', 'Info'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('parent_id', $this->parent_id);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('type', $this->type, true);
		$criteria->compare('path', $this->path, true);
		$criteria->compare('md5', $this->md5, true);
		$criteria->compare('originalName', $this->originalName, true);
		$criteria->compare('mimeType', $this->mimeType, true);
		$criteria->compare('size', $this->size);
		$criteria->compare('info', $this->info, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
