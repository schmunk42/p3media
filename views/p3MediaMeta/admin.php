<?php
$this->breadcrumbs['P3 Media Metas'] = array('admin');
$this->breadcrumbs[] = Yii::t('app', 'Admin');


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

<h1>
    <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'P3 Media Metas'); ?> </h1>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>
<?php
$locale = CLocale::getInstance(Yii::app()->language);

 $this->widget('TbGridView', array(
'id'=>'p3-media-meta-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'pager' => array(
    'class' => 'TbPager',
    'displayFirstAndLast' => true,
),
'columns'=>array(


		array(
					'name'=>'id',
					'value'=>'CHtml::value($data,\'id0.title\')',
							'filter'=>CHtml::listData(P3Media::model()->findAll(), 'id', 'title'),
							),
		'status',
		'type',
		'language',
		array(
					'name'=>'treeParent_id',
					'value'=>'CHtml::value($data,\'p3MediaMetas.status\')',
							'filter'=>CHtml::listData(P3MediaMeta::model()->findAll(), 'id', 'status'),
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
'class'=>'TbButtonColumn',
'viewButtonUrl' => "Yii::app()->controller->createUrl('view', array('id' => \$data->id))",
'updateButtonUrl' => "Yii::app()->controller->createUrl('update', array('id' => \$data->id))",
'deleteButtonUrl' => "Yii::app()->controller->createUrl('delete', array('id' => \$data->id))",

),
),
)); ?>
