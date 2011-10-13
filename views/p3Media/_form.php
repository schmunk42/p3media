<div class="form">
<p class="note">
<?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
</p>

<?php $form=$this->beginWidget(
	'CActiveForm', 
	array(
		'id'=>'p3-media-form',
		'enableAjaxValidation'=>true,	
		'htmlOptions' => array(
			'enctype' => 'multipart/form-data'
		)
	)
	); 
	echo $form->errorSummary($model);
?>

<div class="row">
		<?php echo CHtml::label('Upload File', 'fileUpload'); ?>
		<div>

			<?php
			echo CHtml::fileField('fileUpload', null, array(
				'style' => 'width: 100%',
				'onchange'=>'if (!$("#P3Media_title").val()) $("#P3Media_title").val($("#fileUpload").val());'
				)
			);
			?>
		</div>
		<p class="hint">Maximum size: <?php echo min(ini_get('upload_max_filesize'), ini_get('post_max_size')) ?></p>
	</div>
<div class="row">
	<?php echo CHtml::image(
			Yii::app()->controller->createUrl("/p3media/file/image",array("id"=>$model->id)), 
			$model->title, 
			array("class"=>"ckeditor")
		); ?>
</div>

	<div class="row">
<?php echo $form->labelEx($model,'title'); ?>
<?php echo $form->textField($model,'title',array('size'=>32,'maxlength'=>32)); ?>
<?php echo $form->error($model,'title'); ?>
<div class='hint'><?php if('hint.P3Media.title' != $hint = Yii::t('app', 'title')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'description'); ?>
<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'description'); ?>
<div class='hint'><?php if('hint.P3Media.description' != $hint = Yii::t('app', 'description')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'type'); ?>
<?php echo $form->textField($model,'type'); ?>
<?php echo $form->error($model,'type'); ?>
<div class='hint'><?php if('hint.P3Media.type' != $hint = Yii::t('app', 'type')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'path'); ?>
<?php echo $form->textField($model,'path',array('size'=>60,'maxlength'=>255)); ?>
<?php echo $form->error($model,'path'); ?>
<div class='hint'><?php if('hint.P3Media.path' != $hint = Yii::t('app', 'path')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'md5'); ?>
<?php echo $form->textField($model,'md5',array('size'=>32,'maxlength'=>32)); ?>
<?php echo $form->error($model,'md5'); ?>
<div class='hint'><?php if('hint.P3Media.md5' != $hint = Yii::t('app', 'md5')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'originalName'); ?>
<?php echo $form->textField($model,'originalName',array('size'=>60,'maxlength'=>128)); ?>
<?php echo $form->error($model,'originalName'); ?>
<div class='hint'><?php if('hint.P3Media.originalName' != $hint = Yii::t('app', 'originalName')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'mimeType'); ?>
<?php echo $form->textField($model,'mimeType',array('size'=>60,'maxlength'=>128)); ?>
<?php echo $form->error($model,'mimeType'); ?>
<div class='hint'><?php if('hint.P3Media.mimeType' != $hint = Yii::t('app', 'mimeType')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'size'); ?>
<?php echo $form->textField($model,'size'); ?>
<?php echo $form->error($model,'size'); ?>
<div class='hint'><?php if('hint.P3Media.size' != $hint = Yii::t('app', 'size')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'info'); ?>
<?php echo $form->textArea($model,'info',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'info'); ?>
<div class='hint'><?php if('hint.P3Media.info' != $hint = Yii::t('app', 'info')) echo $hint; ?></div>
</div>

<div class="row">
<label for="metaData"><?php echo Yii::t('app', 'MetaData'); ?></label>
<?php if ($model->metaData !== null) echo $model->metaData->_label;; ?><br />
</div>


<?php
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => array('p3media/admin'))); 
echo CHtml::submitButton(Yii::t('app', 'Save')); 
$this->endWidget(); ?>
</div> <!-- form -->
