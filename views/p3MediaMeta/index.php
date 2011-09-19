<?php
if(!isset($this->breadcrumbs) || ($this->breadcrumbs === array()))

$this->breadcrumbs = array(
	'P3 Media Metas',
	Yii::t('app', 'Index'),
);

if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
	array('label'=>Yii::t('app', 'Create') . ' P3MediaMeta', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' P3MediaMeta', 'url'=>array('admin')),
);
?>

<h1>P3 Media Metas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
