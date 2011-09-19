<?php

class P3Media extends BaseP3Media {

	// Add your model-specific methods here. This file will not be overriden by gtc except you force it.
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function init() {
		return parent::init();
	}

	public function __toString() {
		return (string) $this->title;
	}

	public function rules() {
		return array_merge(
			/* array('column1, column2', 'rule'), */
			parent::rules()
		);
	}

	public function behaviors() {
		return array_merge(
			array(
			'Upload' => array(
				'class' => 'ext.p3extensions.behaviors.P3FileUploadBehavior',
				'dataAlias' => Yii::app()->getModule('p3media')->dataAlias,
				'trashAlias' => Yii::app()->getModule('p3media')->dataAlias.".trash",
				'dataSubdirectory' => Yii::app()->user->id,
				'uploadInstance' => 'fileUpload',
			)
			), parent::behaviors()
		);
	}

	public function getName() {
		return $this->title;
	}

	public function search() {
		$criteria = new CDbCriteria;
		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
			'sort' => array(
				'defaultOrder' => 'id DESC',
			),
			'pagination' => array(
				'pageSize' => 4
			),
		));
	}

}
