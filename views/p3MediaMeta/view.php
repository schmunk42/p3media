<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs=array(
'P3 Media Metas'=>array('index'),
	$model->id,
	);

if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
		array('label'=>Yii::t('app', 'List') . ' P3MediaMeta', 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' P3MediaMeta', 'url'=>array('create')),
		array('label'=>Yii::t('app', 'Update') . ' P3MediaMeta', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>Yii::t('app', 'Delete') . ' P3MediaMeta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>Yii::t('app', 'Manage') . ' P3MediaMeta', 'url'=>array('admin')),
		);
?>

<h1><?php echo Yii::t('app', 'View');?> P3MediaMeta #<?php echo $model->id; ?></h1>

<?php
$locale = CLocale::getInstance(Yii::app()->language);

 $this->widget('zii.widgets.CDetailView', array(
'data'=>$model,
	'attributes'=>array(
					array(
			'name'=>'id',
			'value'=>($model->id0 !== null)?CHtml::link($model->id0->title, array('p3Media/view','id'=>$model->id0->id)):'n/a',
			'type'=>'html',
		),
		array(
			'name'=>'parent_id',
			'value'=>($model->parent !== null)?CHtml::link($model->parent->owner, array('p3MediaMeta/view','id'=>$model->parent->id)):'n/a',
			'type'=>'html',
		),
		'owner',
		'language',
		'status',
		'type',
		'checkAccess',
		'begin',
		'end',
		'createdAt',
		'createdBy',
		'modifiedAt',
		'modifiedBy',
		'keywords',
		'customData',
),
	)); ?>


	<h2><?php echo CHtml::link(Yii::t('app','{relation}',array('{relation}'=>'P3MediaMetas')), array('p3MediaMeta/admin'));?></h2>
<ul><?php if (is_array($model->p3MediaMetas)) foreach($model->p3MediaMetas as $foreignobj) { 

					echo '<li>';
					echo CHtml::link(
						$foreignobj->owner?$foreignobj->owner:$foreignobj->id,
						array('p3MediaMeta/view', 'id' => $foreignobj->id));

					}; ?></ul><p><?php echo CHtml::link(
				Yii::t('app','Create'),
				array('p3MediaMeta/create', 'P3MediaMeta' => array('parent_id'=>$model->id))
				);  ?></p>