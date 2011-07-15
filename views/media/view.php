<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs=array(
'Medias'=>array('index'),
	$model->title,
	);

if(!isset($this->menu))
$this->menu=array(
		array('label'=>Yii::t('app', 'List') . ' Media', 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' Media', 'url'=>array('create')),
		array('label'=>Yii::t('app', 'Update') . ' Media', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>Yii::t('app', 'Delete') . ' Media', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>Yii::t('app', 'Manage') . ' Media', 'url'=>array('admin')),
		);
?>

<h1><?php echo Yii::t('app', 'View');?> Media #<?php echo $model->id; ?></h1>

<?php
$locale = CLocale::getInstance(Yii::app()->language);

 $this->widget('zii.widgets.CDetailView', array(
'data'=>$model,
	'attributes'=>array(
					'id',
		array(
			'name'=>'parent_id',
			'value'=>($model->parent !== null)?CHtml::link($model->parent->title, array('media/view','id'=>$model->parent->id)):'n/a',
			'type'=>'html',
		),
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


	<h2><?php echo CHtml::link(Yii::t('app','{relation}',array('{relation}'=>'Medias')), array('media/admin'));?></h2>
<ul><?php foreach($model->medias as $foreignobj) { 

					echo '<li>';
					echo CHtml::link(
						$foreignobj->title?$foreignobj->title:$foreignobj->id,
						array('/media/view', 'id' => $foreignobj->id));

					}; ?></ul><p><?php echo CHtml::link(
				Yii::t('app','Create'),
				array('/media/create', 'Media' => array('parent_id'=>$model->id))
				);  ?></p><h2><?php echo CHtml::link(Yii::t('app','{relation}',array('{relation}'=>'MediaMetas')), array('mediaMeta/admin'));?></h2>
<ul><?php foreach($model->mediaMetas as $foreignobj) { 

					echo '<li>';
					echo CHtml::link(
						$foreignobj->owner?$foreignobj->owner:$foreignobj->Array,
						array('/mediaMeta/view', 'id' => $foreignobj->Array));

					}; ?></ul><p><?php echo CHtml::link(
				Yii::t('app','Create'),
				array('/mediaMeta/create', 'MediaMeta' => array('p3_media_id'=>$model->id))
				);  ?></p>