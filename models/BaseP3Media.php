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
 * This is the model base class for the table "p3_media".
 *
 * Columns in table "p3_media" available as properties of the model:
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $type
 * @property string $path
 * @property string $md5
 * @property string $originalName
 * @property string $mimeType
 * @property integer $size
 * @property string $info
 *
 * Relations of table "p3_media" available as properties of the model:
 * @property P3MediaMeta $p3MediaMeta
 * 
 * @author Tobias Munk <schmunk@usrbin.de>
 * @package p3media.models
 * @since 3.0.1
 */
abstract class BaseP3Media extends CActiveRecord{
	
	public $type = 1;
	
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
			array('path, title', 'unique'),
			array('title', 'identificationColumnValidator'),
			array('title', 'required'),
			array('description, type, path, md5, originalName, mimeType, nameId, size, info', 'default', 'setOnEmpty' => true, 'value' => null),
			array('type, size', 'numerical', 'integerOnly'=>true),
			array('md5', 'length', 'max'=>32),
			array('path', 'length', 'max'=>255),
			array('originalName, mimeType', 'length', 'max'=>128),
            array('title, nameId', 'length', 'max' => 64),
			array('description, info', 'safe'),
			array('id, title, description, type, path, md5, originalName, mimeType, size, info', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'p3MediaMeta' => array(self::HAS_ONE, 'P3MediaMeta', 'id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('P3MediaModule.crud', 'ID'),
			'title' => Yii::t('P3MediaModule.crud', 'Title'),
			'description' => Yii::t('P3MediaModule.crud', 'Description'),
			'type' => Yii::t('P3MediaModule.crud', 'Type'),
			'path' => Yii::t('P3MediaModule.crud', 'Path'),
			'md5' => Yii::t('P3MediaModule.crud', 'MD5'),
			'originalName' => Yii::t('P3MediaModule.crud', 'Original Name'),
			'mimeType' => Yii::t('P3MediaModule.crud', 'MIME Type'),
			'size' => Yii::t('P3MediaModule.crud', 'Size'),
			'info' => Yii::t('P3MediaModule.crud', 'Info'),
            'nameId' => Yii::t('P3MediaModule.crud', 'Name ID'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('type', $this->type);
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
	
	public function get_label()
	{
		return '#'.$this->id;
		
			}
	
}
