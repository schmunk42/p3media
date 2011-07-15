<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs = array(
	'Medias',
	Yii::t('app', 'Index'),
);

if(!isset($this->menu))
$this->menu=array(
	array('label'=>Yii::t('app', 'Create') . ' Media', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' Media', 'url'=>array('admin')),
);
?>

<h1>Medias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
