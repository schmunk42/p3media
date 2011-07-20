<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs=array(
'P3 Medias'=>array('index'),
	$model->title,
	);

if(!isset($this->menu))
$this->menu=array(
		array('label'=>Yii::t('app', 'List') . ' P3Media', 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' P3Media', 'url'=>array('create')),
		array('label'=>Yii::t('app', 'Update') . ' P3Media', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>Yii::t('app', 'Delete') . ' P3Media', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>Yii::t('app', 'Manage') . ' P3Media', 'url'=>array('admin')),
		);
?>

<h1><?php echo Yii::t('app', 'View');?> P3Media #<?php echo $model->id; ?></h1>

<?php
$locale = CLocale::getInstance(Yii::app()->language);

 $this->widget('zii.widgets.CDetailView', array(
'data'=>$model,
	'attributes'=>array(
					'id',
		'parent_id',
		'title',
		'description',
		'type',
		'path',
		'md5',
		'originalName',
		'mimeType',
		'size',
		'info',
),
	)); ?>


	