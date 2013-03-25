<?php
$this->breadcrumbs['P3 Medias'] = array('admin');
$this->breadcrumbs[] = Yii::t('app', 'Admin');


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
    <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'P3 Medias'); ?> </h1>

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
