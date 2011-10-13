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

<div class="span-8">
	<h2>Menu</h2>
	<p>
		<?php
		echo CHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button'));
		echo " ";
		echo CHtml::link('Upload', array('/p3media/import/upload'), array('target' => '_blank'));
		echo " ";
		echo CHtml::link('Reload', null, array('target' => '_blank', 'onclick' => 'location.reload();'));
		?>
	</p>

	<div class="search-form" style="display:none">
		<?php
		$this->renderPartial('/p3Media/_search', array(
			'model' => $model,
		));
		?>
	</div>
</div>

<div class="span-8 last">
	<h2>Preset</h2>
	<p>
		<?php
		foreach ($this->module->params['presets'] AS $key => $preset) {
			$data[$key] = (isset($preset['name'])) ? $preset['name'] : $key;
		}
		echo Chtml::dropDownList("preset", null, $data);
		?>
	</p>
</div>

<?php
$locale = CLocale::getInstance(Yii::app()->language);
$this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'p3-media-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		array(
			#'name' => 'path',
			'type' => 'raw',
			'value' => 'CHtml::link(
				CHtml::image(Yii::app()->controller->createUrl("/p3media/file/image",array("id"=>$data->id,"preset"=>"fckbrowse")), $data->title, array("class"=>"ckeditor")),
				"#", 
				array("onclick"=>"select(".$data->id.");")
				)
				',
		),
		'id',
		/* array(
		  'name' => 'metaData.treeParent_id',
		  'value' => 'CHtml::value($data,\'metaData.treeParent_id\')',
		  'filter' => CHtml::listData(P3Media::model()->with('metaData')->findAll(), 'metaData.id', 'recordTitle'),
		  ), */
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
		if($('#preset').val() == '') {
			alert('Please choose an image preset.');
			return false;
		}
		var preset = $('#preset').val();
		if (confirm('Select #'+id+' as \''+preset+'\'?')) {		
			//alert(id+'-'+preset);
			url = '<?php echo CController::createUrl('/p3media/file/image', array('id' => '__ID__', 'preset' => '__PRESET__')) ?>';
			url = url.replace('__PRESET__', preset);
			url = url.replace('__ID__', id);
			//alert (url);
			window.opener.CKEDITOR.tools.callFunction(<?php echo $_REQUEST['CKEditorFuncNum'] ?>,url);
			window.close();
		};
	}
</script>
