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
				#'onchange'=>'$("#P2File_name").val($("#fileUpload").val());'
				)
			);
			?>
		</div>
		<p class="hint">Maximum size: <?php echo min(ini_get('upload_max_filesize'), ini_get('post_max_size')) ?></p>
	</div>

	<div class="row">
<?php echo $form->labelEx($model,'title'); ?>
<?php echo $form->textField($model,'title',array('size'=>32,'maxlength'=>32)); ?>
<?php echo $form->error($model,'title'); ?>
<div class='hint'><?php if('hint.title' != $hint = Yii::t('P3Media', 'hint.title')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'description'); ?>
<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'description'); ?>
<div class='hint'><?php if('hint.description' != $hint = Yii::t('P3Media', 'hint.description')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'type'); ?>
<?php echo $form->textField($model,'type'); ?>
<?php echo $form->error($model,'type'); ?>
<div class='hint'><?php if('hint.type' != $hint = Yii::t('P3Media', 'hint.type')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'path'); ?>
<?php echo $form->textField($model,'path',array('size'=>60,'maxlength'=>255)); ?>
<?php echo $form->error($model,'path'); ?>
<div class='hint'><?php if('hint.path' != $hint = Yii::t('P3Media', 'hint.path')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'md5'); ?>
<?php echo $form->textField($model,'md5',array('size'=>32,'maxlength'=>32)); ?>
<?php echo $form->error($model,'md5'); ?>
<div class='hint'><?php if('hint.md5' != $hint = Yii::t('P3Media', 'hint.md5')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'originalName'); ?>
<?php echo $form->textField($model,'originalName',array('size'=>60,'maxlength'=>128)); ?>
<?php echo $form->error($model,'originalName'); ?>
<div class='hint'><?php if('hint.originalName' != $hint = Yii::t('P3Media', 'hint.originalName')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'mimeType'); ?>
<?php echo $form->textField($model,'mimeType',array('size'=>60,'maxlength'=>128)); ?>
<?php echo $form->error($model,'mimeType'); ?>
<div class='hint'><?php if('hint.mimeType' != $hint = Yii::t('P3Media', 'hint.mimeType')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'size'); ?>
<?php echo $form->textField($model,'size'); ?>
<?php echo $form->error($model,'size'); ?>
<div class='hint'><?php if('hint.size' != $hint = Yii::t('P3Media', 'hint.size')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'info'); ?>
<?php echo $form->textArea($model,'info',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'info'); ?>
<div class='hint'><?php if('hint.info' != $hint = Yii::t('P3Media', 'hint.info')) echo $hint; ?></div>
</div>

<div class="row">
<label for="p3MediaMeta"><?php echo Yii::t('app', 'P3MediaMeta'); ?></label>
<?php if ($model->p3MediaMeta !== null) echo $model->p3MediaMeta->recordTitle;; ?><br />
<div class='hint'><?php if('hint.p3MediaMeta' != $hint = Yii::t('P3Media', 'hint.p3MediaMeta')) echo $hint; ?></div>
</div>


<?php
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => array('p3media/admin'))); 
echo CHtml::submitButton(Yii::t('app', 'Save')); 
$this->endWidget(); ?>
</div> <!-- form -->
