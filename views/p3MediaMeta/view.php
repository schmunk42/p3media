<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs=array(
'P3 Media Metas'=>array('index'),
	$model->id,
	);

if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
	array(
		'label' => Yii::t('app', 'Record'), 
		'items' => array(
			array('label'=>Yii::t('app', 'Update') , 'url'=>array('update', 'id'=>$model->id)),
			array('label'=>Yii::t('app', 'Delete') , 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		)
	),
	array(
		'label' => Yii::t('app', 'Administration'), 
		'items' => array(
			/*array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),*/
			array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
			array('label'=>Yii::t('app', 'Manage') , 'url'=>array('admin')),
		)
	)
);
?>

<h1><?php echo Yii::t('app', 'View').' '.Yii::t('app', 'P3MediaMeta') . ' #' .$model->id; ?></h1>

<?php
$locale = CLocale::getInstance(Yii::app()->language);

 $this->widget('zii.widgets.CDetailView', array(
'data'=>$model,
	'attributes'=>array(
					array(
			'name'=>'id',
			'value'=>($model->id0 !== null)?CHtml::link($model->id0->recordTitle, array('p3Media/view','id'=>$model->id0->id)).' '.CHtml::link(Yii::t('app','Update'), array('p3Media/update','id'=>$model->id0->id), array('class'=>'edit')):'n/a',
			'type'=>'html',
		),
		'status',
		'type',
		'language',
		array(
			'name'=>'treeParent_id',
			'value'=>($model->treeParent !== null)?CHtml::link($model->treeParent->recordTitle, array('p3MediaMeta/view','id'=>$model->treeParent->id)).' '.CHtml::link(Yii::t('app','Update'), array('p3MediaMeta/update','id'=>$model->treeParent->id), array('class'=>'edit')):'n/a',
			'type'=>'html',
		),
		'treePosition',
		'begin',
		'end',
		'keywords',
		'customData',
		'label',
		'owner',
		'checkAccessCreate',
		'checkAccessRead',
		'checkAccessUpdate',
		'checkAccessDelete',
		'createdAt',
		'createdBy',
		'modifiedAt',
		'modifiedBy',
		'guid',
		'ancestor_guid',
		'model',
),
	)); ?>


	<h2><?php echo CHtml::link(Yii::t('app','P3MediaMetas'), array('/p3MediaMeta/admin'));?></h2>
<ul>
			<?php if (is_array($model->p3MediaMetas)) foreach($model->p3MediaMetas as $foreignobj) { 

					echo '<li>';
					echo CHtml::link($foreignobj->recordTitle, array('/p3MediaMeta/view','id'=>$foreignobj->id));
							
					echo ' '.CHtml::link(Yii::t('app','Update'), array('/p3MediaMeta/update','id'=>$foreignobj->id), array('class'=>'edit'));

					}
						?></ul><p><?php echo CHtml::link(
				Yii::t('app','Create'),
				array('/p3MediaMeta/create', 'P3MediaMeta' => array('treeParent_id'=>$model->{$model->tableSchema->primaryKey}))
				);  ?></p>