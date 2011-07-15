<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs=array(
'Media Metas'=>array('index'),
	$model->id,
	);

if(!isset($this->menu))
$this->menu=array(
		array('label'=>Yii::t('app', 'List') . ' MediaMeta', 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' MediaMeta', 'url'=>array('create')),
		array('label'=>Yii::t('app', 'Update') . ' MediaMeta', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>Yii::t('app', 'Delete') . ' MediaMeta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>Yii::t('app', 'Manage') . ' MediaMeta', 'url'=>array('admin')),
		);
?>

<h1><?php echo Yii::t('app', 'View');?> MediaMeta #<?php echo $model->id; ?></h1>

<?php
$locale = CLocale::getInstance(Yii::app()->language);

 $this->widget('zii.widgets.CDetailView', array(
'data'=>$model,
	'attributes'=>array(
					'id',
		array(
			'name'=>'parent_id',
			'value'=>($model->parent !== null)?CHtml::link($model->parent->owner, array('mediaMeta/view','id'=>$model->parent->id)):'n/a',
			'type'=>'html',
		),
		array(
			'name'=>'p3_media_id',
			'value'=>($model->p3Media !== null)?CHtml::link($model->p3Media->title, array('media/view','id'=>$model->p3Media->id)):'n/a',
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


	<h2><?php echo CHtml::link(Yii::t('app','{relation}',array('{relation}'=>'MediaMetas')), array('mediaMeta/admin'));?></h2>
<ul><?php foreach($model->mediaMetas as $foreignobj) { 

					echo '<li>';
					echo CHtml::link(
						$foreignobj->owner?$foreignobj->owner:$foreignobj->id,
						array('/mediaMeta/view', 'id' => $foreignobj->id));

					}; ?></ul><p><?php echo CHtml::link(
				Yii::t('app','Create'),
				array('/mediaMeta/create', 'MediaMeta' => array('parent_id'=>$model->id))
				);  ?></p>