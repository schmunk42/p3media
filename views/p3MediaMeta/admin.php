<?php
if(!isset($this->breadcrumbs) || ($this->breadcrumbs === array()))

$this->breadcrumbs=array(
	'P3 Media Metas'=>array(Yii::t('app', 'index')),
	Yii::t('app', 'Manage'),
);

if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
	array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
	array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),
);


		Yii::app()->clientScript->registerScript('search', "
			$('.search-button').click(function(){
				$('.search-form').toggle();
				return false;
				});
			$('.search-form form').submit(function(){
				$.fn.yiiGridView.update('p3-media-meta-grid', {
data: $(this).serialize()
});
				return false;
				});
			");
		?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'P3 Media Metas'); ?> </h1>


<ul><li>BelongsTo <a href="/NetBeans/p3-git/p3media/p3Media/admin">P3Media</a> </li><li>BelongsTo <a href="/NetBeans/p3-git/p3media/p3MediaMeta/admin">P3MediaMeta</a> </li><li>HasMany <a href="/NetBeans/p3-git/p3media/p3MediaMeta/admin">P3MediaMeta</a> </li></ul>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'),'#',array('class'=>'search-button')); ?><div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>
<?php
$locale = CLocale::getInstance(Yii::app()->language);

 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'p3-media-meta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(

	
		array(
					'name'=>'id',
					'value'=>'CHtml::value($data,\'id0._label\')',
							'filter'=>CHtml::listData(P3Media::model()->findAll(), 'id', '_label'),
							),
		'status',
		'type',
		'language',
		array(
					'name'=>'treeParent_id',
					'value'=>'CHtml::value($data,\'p3MediaMetas._label\')',
							'filter'=>CHtml::listData(P3MediaMeta::model()->findAll(), 'id', '_label'),
							),
		'treePosition',
		/*
		'begin',
		'end',
#		'keywords',
#		'customData',
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
		*/
		array(
			'class'=>'CButtonColumn',
			'viewButtonUrl' => "Yii::app()->controller->createUrl('view', array('id' => \$data->id))",
			'updateButtonUrl' => "Yii::app()->controller->createUrl('update', array('id' => \$data->id))",
			'deleteButtonUrl' => "Yii::app()->controller->createUrl('delete', array('id' => \$data->id))",

		),
	),
)); ?>
