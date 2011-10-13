<?php
$this->breadcrumbs['P3 Media Metas'] = array('index');$this->breadcrumbs[] = Yii::t('app', 'Admin');

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
				$.fn.yiiGridView.update('p3-media-grid', {
data: $(this).serialize()
});
				return false;
				});
			");
		?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> <?php echo Yii::t('app', 'P3 Medias'); ?> </h1>


<ul>
	<li>Info <?php echo CHtml::link("P3MediaMeta",array("/p3media/p3MediaMeta/admin")); ?> </li>
</ul>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'),'#',array('class'=>'search-button')); ?><div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>
<?php
$locale = CLocale::getInstance(Yii::app()->language);

 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'p3-media-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'type' => 'raw',
			'value' => 'CHtml::link(
							CHtml::image(Yii::app()->controller->createUrl("/p3media/file/image",array("id"=>$data->id,"preset"=>"thumb")),	$data->title, array("class"=>"ckeditor")),
							Yii::app()->controller->createUrl("/p3media/p3Media/update",array("id"=>$data->id)), 
							array("onclick"=>"select(".$data->id.");")
						)
				',
		),
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
			'class'=>'CButtonColumn',
			'viewButtonUrl' => "Yii::app()->controller->createUrl('view', array('id' => \$data->id))",
			'updateButtonUrl' => "Yii::app()->controller->createUrl('update', array('id' => \$data->id))",
			'deleteButtonUrl' => "Yii::app()->controller->createUrl('delete', array('id' => \$data->id))",

		),
	),
)); ?>
