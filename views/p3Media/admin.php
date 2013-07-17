<?php
$this->breadcrumbs[] = Yii::t('P3MediaModule.crud', 'Manage');


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('p3-media-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>

<h1>
    <?php echo Yii::t('P3MediaModule.crud', 'Media'); ?>
    <small><?php echo Yii::t('P3MediaModule.crud', 'Manage'); ?></small>
</h1>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>
<?php
$locale = CLocale::getInstance(Yii::app()->language);

 $this->widget('TbGridView', array(
'id'=>'p3-media-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'pager' => array(
    'class' => 'TbPager',
    'displayFirstAndLast' => true,
),
'columns'=>array(


		'id',
		'nameId',
		'title',
#		'description',
		'type',
		'path',
		'md5',
		/*
		'originalName',
		'mimeType',
		'size',
#		'info',
		*/
array(
'class'=>'TbButtonColumn',
'viewButtonUrl' => "Yii::app()->controller->createUrl('view', array('id' => \$data->id))",
'updateButtonUrl' => "Yii::app()->controller->createUrl('update', array('id' => \$data->id))",
'deleteButtonUrl' => "Yii::app()->controller->createUrl('delete', array('id' => \$data->id))",

),
),
)); ?>
