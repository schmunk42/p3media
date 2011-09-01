<?php
/* if(!isset($this->breadcrumbs))

  $this->breadcrumbs=array(
  'P3 Medias'=>array(Yii::t('app', 'index')),
  Yii::t('app', 'Manage'),
  ); */


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

<h1> <?php echo Yii::t('app', 'Ckeditor'); ?> P3 Medias</h1>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
	<?php
	$this->renderPartial('/p3Media/_search', array(
		'model' => $model,
	));
	?>
</div>

<?php
$locale = CLocale::getInstance(Yii::app()->language);

$this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'p3-media-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		array(
			'name' => 'path',
			'type' => 'raw',
			'value' => 'CHtml::link(
				CHtml::image(Yii::app()->controller->createUrl("/p3media/file",array("id"=>$data->id)), $data->title, array("class"=>"ckeditor")),
				"#", 
				array("onclick"=>"select(".$data->id.");")
				)
				',
		),
		array(
			'name' => 'parent_id',
			'value' => 'CHtml::value($data,\'p3Medias.recordTitle\')',
			'filter' => CHtml::listData(P3Media::model()->findAll(), 'id', 'recordTitle'),
		),
		'title',
		'description',
		'mimeType',
		'path',
	/*
	  'md5',
	  'originalName',
	  'mimeType',
	  'size',
	  'info',
	 */
	),
));
?>

<script type="text/javascript">
	function select(id){
		if (confirm('Select #'+id+'')) {		
			//alert(id+'-'+preset);
			//if($('#preset').val() == '') {
			//    alert('Please choose an image preset.');
			//    return false;
			//}
			url = '<?php echo CController::createUrl('/p3media/file', array('id' => '__ID__', 'preset' => '__PRESET__')) ?>';
			//url = url.replace('__PRESET__', preset);
			url = url.replace('__ID__', id);
			//alert (url);
			window.opener.CKEDITOR.tools.callFunction(<?php echo $_REQUEST['CKEditorFuncNum'] ?>,url);
			window.close();
		};
	}
</script>
