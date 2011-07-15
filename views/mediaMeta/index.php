<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs = array(
	'Media Metas',
	Yii::t('app', 'Index'),
);

if(!isset($this->menu))
$this->menu=array(
	array('label'=>Yii::t('app', 'Create') . ' MediaMeta', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' MediaMeta', 'url'=>array('admin')),
);
?>

<h1>Media Metas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
