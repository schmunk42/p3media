<?php
/**
 * View file.
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @link http://www.phundament.com/
 * @copyright Copyright &copy; 2005-2011 diemeisterei GmbH
 * @license http://www.phundament.com/license/
 */
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
<div class="ckeditor">
	<h1> <?php echo Yii::t('app', 'Ckeditor'); ?> P3 Medias</h1>
	<div class="row">
		<div class="span6">
			<h3>Operations</h3>
			<p>
				<?php
				foreach ($this->module->params['presets'] AS $key => $preset) {
					$identifier = $key . ((isset($preset['type'])) ? '|' . $preset['type'] : '');
					$data[$identifier] = (isset($preset['name'])) ? $preset['name'] : $key;
				}
				echo CHtml::dropDownList("preset", null, $data, array("class"=>"span3 btn"));
				?>

				<?php
				#echo CHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button'));
				#echo " ";
				echo CHtml::link('Upload', array('/p3media/import/upload'), array('target' => '_blank', 'class' => 'btn'));
				echo " ";
				echo CHtml::link('Reload', null, array('target' => '_blank', 'class' => 'btn', 'onclick' => 'location.reload();'));
				?>
			</p>


		</div>
		<div class="span6">
			<h3>Search</h3>
			<div class="Xform form-inline">
				<?php
				$form = $this->beginWidget('CActiveForm', array(
					//'action'=>Yii::app()->createUrl($this->route),
					'method' => 'get',
					));
				?>

				<?php echo $form->label($model, 'id'); ?>
				<?php echo $form->textField($model, 'id', array('size' => 4, 'maxlength' => 32, 'class' => 'span1')); ?>

				<?php echo $form->label($model, 'title'); ?>
				<?php echo $form->textField($model, 'title', array('size' => 12, 'maxlength' => 32, 'class' => 'span2')); ?>
<br/>
				<?php #echo $form->label($model, 'description'); ?>
				<?php #	echo $form->textField($model, 'description', array('size' => 12, 'maxlength' => 32, 'class' => 'span2')); ?>

				<?php echo $form->label($model, 'type'); ?>
				<?php echo $form->textField($model, 'type', array('size' => 12, 'maxlength' => 32, 'class' => 'span1')); ?>


				<?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>

				<?php $this->endWidget(); ?>

			</div><!-- search-form -->
		</div>


	</div>
	<div class="row">
		<div class="search-form" style="display:nonex">



		</div>
	</div>
	<div class="row">
		<div class="span12">
			<?php
			$this->widget('bootstrap.widgets.TbThumbnails', array(
				'dataProvider' => $model->search(),
				'template' => "{pager}\n{items}",
				'itemView' => '_thumb',
				// Remove the existing tooltips and rebind the plugin after each ajax-call.
				'afterAjaxUpdate' => "js:function() {
        jQuery('.tooltip').remove();
        jQuery('a[rel=tooltip]').tooltip();
    }",
			));
			?>
		</div>
	</div>
</div>

<script type="text/javascript">
	function select(id,title){
		if($('#preset').val() == '') {
			alert('Please choose an image preset.');
			return false;
		}
		var identifier = $('#preset').val();
		if (confirm('Select #'+id+' as \''+identifier+'\'?')) {
			//alert(id+'-'+preset);
			var split;
			split = identifier.split('|')
			var preset = split[0];
			var extension = '.'+split[1]; // TODO: retrieve type from PHP preset
			//var title = 'p3media'; // TODO
			url = '<?php echo CController::createUrl('/p3media/file/image', array('title' => '__TITLE__', 'id' => '__ID__', 'preset' => '__PRESET__', 'extension' => '__EXT__')) ?>';
			url = url.replace('__TITLE__', title);
			url = url.replace('__EXT__', extension);
			url = url.replace('__PRESET__', preset);
			url = url.replace('__ID__', id);
			//alert (url);
			window.opener.CKEDITOR.tools.callFunction(<?php echo $_REQUEST['CKEditorFuncNum'] ?>,url);
			window.close();
		};
	}
</script>

<?php
// always use the backend theme for this view
Yii::app()->theme = (Yii::app()->params['p3.backendTheme'])?Yii::app()->params['p3.backendTheme']:"backend";
?>