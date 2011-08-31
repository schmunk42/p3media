<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs = array(
	'P3 Medias',
	Yii::t('app', 'Index'),
);

if(!isset($this->menu))
$this->menu=array(
	array('label'=>Yii::t('app', 'Create') . ' P3Media', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' P3Media', 'url'=>array('admin')),
);
?>

<h1>P3 Medias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
