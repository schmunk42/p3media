<?php
if(!isset($this->breadcrumbs))
$this->breadcrumbs=array(
	'Medias'=>array(Yii::t('app', 'index')),
	Yii::t('app', 'Create'),
);

if(!isset($this->menu))
$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' Media', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Manage') . ' Media', 'url'=>array('admin')),
);
?>

<h1> Create Media </h1>
<?php
$this->renderPartial('_form', array(
			'model' => $model,
			'buttons' => 'create'));

?>

