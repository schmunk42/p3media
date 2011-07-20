<?php

/**
 * This is the model base class for the table "p3_media_meta".
 *
 * Columns in table "p3_media_meta" available as properties of the model:
 * @property integer $id
 * @property integer $parent_id
 * @property integer $p3_media_id
 * @property integer $owner
 * @property string $language
 * @property integer $status
 * @property string $type
 * @property string $checkAccess
 * @property string $begin
 * @property string $end
 * @property string $createdAt
 * @property string $createdBy
 * @property string $modifiedAt
 * @property string $modifiedBy
 * @property string $keywords
 * @property string $customData
 *
 * There are no model relations.
 */
abstract class BaseP3MediaMeta extends GActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'p3_media_meta';
	}

	public function rules()
	{
		return array(
			array('id, parent_id, p3_media_id, modifiedAt', 'required'),
			array('owner, language, status, type, checkAccess, begin, end, createdAt, createdBy, modifiedBy, keywords, customData', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, parent_id, p3_media_id, owner, status', 'numerical', 'integerOnly'=>true),
			array('language', 'length', 'max'=>8),
			array('type', 'length', 'max'=>45),
			array('checkAccess', 'length', 'max'=>128),
			array('createdBy, modifiedBy', 'length', 'max'=>32),
			array('keywords', 'length', 'max'=>255),
			array('begin, end, createdAt, customData', 'safe'),
			array('id, parent_id, p3_media_id, owner, language, status, type, checkAccess, begin, end, createdAt, createdBy, modifiedAt, modifiedBy, keywords, customData', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app', 'ID'),
			'parent_id' => Yii::t('app', 'Parent'),
			'p3_media_id' => Yii::t('app', 'P3 Media'),
			'owner' => Yii::t('app', 'Owner'),
			'language' => Yii::t('app', 'Language'),
			'status' => Yii::t('app', 'Status'),
			'type' => Yii::t('app', 'Type'),
			'checkAccess' => Yii::t('app', 'Check Access'),
			'begin' => Yii::t('app', 'Begin'),
			'end' => Yii::t('app', 'End'),
			'createdAt' => Yii::t('app', 'Created At'),
			'createdBy' => Yii::t('app', 'Created By'),
			'modifiedAt' => Yii::t('app', 'Modified At'),
			'modifiedBy' => Yii::t('app', 'Modified By'),
			'keywords' => Yii::t('app', 'Keywords'),
			'customData' => Yii::t('app', 'Custom Data'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('parent_id', $this->parent_id);
		$criteria->compare('p3_media_id', $this->p3_media_id);
		$criteria->compare('owner', $this->owner);
		$criteria->compare('language', $this->language, true);
		$criteria->compare('status', $this->status);
		$criteria->compare('type', $this->type, true);
		$criteria->compare('checkAccess', $this->checkAccess, true);
		$criteria->compare('begin', $this->begin, true);
		$criteria->compare('end', $this->end, true);
		$criteria->compare('createdAt', $this->createdAt, true);
		$criteria->compare('createdBy', $this->createdBy, true);
		$criteria->compare('modifiedAt', $this->modifiedAt, true);
		$criteria->compare('modifiedBy', $this->modifiedBy, true);
		$criteria->compare('keywords', $this->keywords, true);
		$criteria->compare('customData', $this->customData, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
