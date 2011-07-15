<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs=array(
	'Medias'=>array(Yii::t('app', 'index')),
	Yii::t('app', 'Manage'),
);

if(!isset($this->menu))
$this->menu=array(
		array('label'=>Yii::t('app', 'List') . ' Media',
			'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' Media',
		'url'=>array('create')),
	);

		Yii::app()->clientScript->registerScript('search', "
			$('.search-button').click(function(){
				$('.search-form').toggle();
				return false;
				});
			$('.search-form form').submit(function(){
				$.fn.yiiGridView.update('media-grid', {
data: $(this).serialize()
});
				return false;
				});
			");
		?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> Medias</h1>

<?php
echo "<ul>";
foreach ($model->relations() AS $key => $relation)
{
	echo  "<li>".
		substr(str_replace("Relation","",$relation[0]),1)." ".
		CHtml::link(Yii::t("app",$relation[1]), array("/".$this->resolveRelationController($relation)."/admin"))." (".$relation[2].")".
		" </li>";
}
echo "</ul>";
?>
<?php echo CHtml::link(Yii::t('app', 'Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

<?php
$locale = CLocale::getInstance(Yii::app()->language);

 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'media-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
					'name'=>'parent_id',
					'value'=>'CHtml::value($data,\'medias.recordTitle\')',
							'filter'=>CHtml::listData(Media::model()->findAll(), 'id', 'recordTitle'),
							),
		'title',
		'description',
		'type',
		'path',
		/*
		'md5',
		'originalName',
		'mimeType',
		'size',
		'info',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
