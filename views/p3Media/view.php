<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs=array(
'P3 Medias'=>array('index'),
	$model->title,
	);

if(!isset($this->menu) || $this->menu === array())
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
		array(
			'name'=>'parent_id',
			'value'=>($model->parent !== null)?CHtml::link($model->parent->title, array('p3Media/view','id'=>$model->parent->id)):'n/a',
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


	<h2><?php echo CHtml::link(Yii::t('app','{relation}',array('{relation}'=>'P3Medias')), array('p3Media/admin'));?></h2>
<ul><?php if (is_array($model->p3Medias)) foreach($model->p3Medias as $foreignobj) { 

					echo '<li>';
					echo CHtml::link(
						$foreignobj->title?$foreignobj->title:$foreignobj->id,
						array('p3Media/view', 'id' => $foreignobj->id));

					}; ?></ul><p><?php echo CHtml::link(
				Yii::t('app','Create'),
				array('p3Media/create', 'P3Media' => array('parent_id'=>$model->id))
				);  ?></p><h2><?php echo CHtml::link(Yii::t('app','{relation}',array('{relation}'=>'P3MediaMeta')),'/$this->resolveRelationController($relation)/admin');?></h2>
<ul><?php $foreignobj = $model->p3MediaMeta; 

					if ($foreignobj !== null) {
					echo '<li>';
					echo CHtml::link(
						$foreignobj->owner?$foreignobj->owner:$foreignobj->id,
						array('$this->resolveRelationController($relation)/view', 'id' => $foreignobj->id));

					} ?></ul><p><?php if($model->p3MediaMeta === null) echo CHtml::link(
				Yii::t('app','Create'),
				array('p3MediaMeta/create', 'P3MediaMeta' => array('id'=>$model->{$model->tableSchema->primaryKey}))
				);  ?></p>