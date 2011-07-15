<?php
if(!isset($this->breadcrumbs))
$this->breadcrumbs=array(
	'Media Metas'=>array(Yii::t('app', 'index')),
	Yii::t('app', 'Create'),
);

if(!isset($this->menu))
$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' MediaMeta', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Manage') . ' MediaMeta', 'url'=>array('admin')),
);
?>

<h1> Create MediaMeta </h1>
<?php
$this->renderPartial('_form', array(
			'model' => $model,
			'buttons' => 'create'));

?>

