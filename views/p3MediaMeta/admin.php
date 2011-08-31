<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs=array(
	'P3 Media Metas'=>array(Yii::t('app', 'index')),
	Yii::t('app', 'Manage'),
);

if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
		array('label'=>Yii::t('app', 'List') . ' P3MediaMeta',
			'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' P3MediaMeta',
		'url'=>array('create')),
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

<h1> <?php echo Yii::t('app', 'Manage'); ?> P3 Media Metas</h1>

<?php
echo "<ul>";
foreach ($model->relations() AS $key => $relation)
{
	echo  "<li>".
		substr(str_replace("Relation","",$relation[0]),1)." ".
		CHtml::link(Yii::t("app",$relation[1]), array($this->resolveRelationController($relation)."/admin"))." (".$relation[2].")".
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
	'id'=>'p3-media-meta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
					'name'=>'id',
					'value'=>'CHtml::value($data,\'id0.recordTitle\')',
							'filter'=>CHtml::listData(P3Media::model()->findAll(), 'id', 'recordTitle'),
							),
		array(
					'name'=>'parent_id',
					'value'=>'CHtml::value($data,\'p3MediaMetas.recordTitle\')',
							'filter'=>CHtml::listData(P3MediaMeta::model()->findAll(), 'id', 'recordTitle'),
							),
		'owner',
		'language',
		'status',
		'type',
		/*
		'checkAccess',
		'begin',
		'end',
		'createdAt',
		'createdBy',
		'modifiedAt',
		'modifiedBy',
		'keywords',
		'customData',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
