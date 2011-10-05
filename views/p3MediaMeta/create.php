<?php
if(!isset($this->breadcrumbs) || ($this->breadcrumbs === array()))

$this->breadcrumbs=array(
	'P3 Media Metas'=>array(Yii::t('app', 'index')),
	Yii::t('app', 'Create'),
);

if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
	/*array('label'=>Yii::t('app', 'List'), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Manage'), 'url'=>array('admin')),*/
);
?>

<h1> Create P3MediaMeta </h1>
<?php
$this->renderPartial('_form', array(
			'model' => $model,
			'buttons' => 'create'));

?>

