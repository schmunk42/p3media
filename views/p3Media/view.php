<?php
$this->breadcrumbs['P3 Medias'] = array('index');$this->breadcrumbs[] = $model->_label;
if(!isset($this->menu) || $this->menu === array()) {
$this->menu=array(
	array('label'=>Yii::t('app', 'Update') , 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app', 'Delete') , 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage') , 'url'=>array('admin')),
	/*array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),*/
);
}
?>

<h1><?php echo Yii::t('app', 'View');?> P3Media #<?php echo $model->id; ?></h1>

<?php
$locale = CLocale::getInstance(Yii::app()->language);

echo $model->image();

 $this->widget('zii.widgets.CDetailView', array(
'data'=>$model,
	'attributes'=>array(
					'id',
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


	<h2><?php echo CHtml::link(Yii::t('app','P3MediaMeta'), array('/p3media/p3MediaMeta/admin'));?></h2>
<ul><?php $foreignobj = $model->metaData; 

					if ($foreignobj !== null) {
					echo '<li>';
					echo '#'.$model->metaData->id.' ';
					echo CHtml::link($model->metaData->_label, array('/p3media/p3MediaMeta/view','id'=>$model->metaData->id));
							
					echo ' '.CHtml::link(Yii::t('app','Update'), array('/p3media/p3MediaMeta/update','id'=>$model->metaData->id), array('class'=>'edit'));

					
					
					}
					?></ul><p><?php if($model->metaData === null) echo CHtml::link(
				Yii::t('app','Create'),
				array('/p3media/p3MediaMeta/create', 'P3MediaMeta' => array('id'=>$model->{$model->tableSchema->primaryKey}))
				);  ?></p>