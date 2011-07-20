<div class="form">
<p class="note">
<?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
</p>

<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'p3-media-form',
	'enableAjaxValidation'=>true,
	)); 
	echo $form->errorSummary($model);
?>
	<div class="row">
<?php echo $form->labelEx($model,'parent_id'); ?>
<?php echo $form->textField($model,'parent_id'); ?>
<?php echo $form->error($model,'parent_id'); ?>
<?php if('_HINT_P3Media.parent_id' != $hint = Yii::t('app', '_HINT_P3Media.parent_id')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'title'); ?>
<?php echo $form->textField($model,'title',array('size'=>32,'maxlength'=>32)); ?>
<?php echo $form->error($model,'title'); ?>
<?php if('_HINT_P3Media.title' != $hint = Yii::t('app', '_HINT_P3Media.title')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'description'); ?>
<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'description'); ?>
<?php if('_HINT_P3Media.description' != $hint = Yii::t('app', '_HINT_P3Media.description')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'type'); ?>
<?php echo $form->textField($model,'type'); ?>
<?php echo $form->error($model,'type'); ?>
<?php if('_HINT_P3Media.type' != $hint = Yii::t('app', '_HINT_P3Media.type')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'path'); ?>
<?php echo $form->textField($model,'path',array('size'=>60,'maxlength'=>255)); ?>
<?php echo $form->error($model,'path'); ?>
<?php if('_HINT_P3Media.path' != $hint = Yii::t('app', '_HINT_P3Media.path')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'md5'); ?>
<?php echo $form->textField($model,'md5',array('size'=>32,'maxlength'=>32)); ?>
<?php echo $form->error($model,'md5'); ?>
<?php if('_HINT_P3Media.md5' != $hint = Yii::t('app', '_HINT_P3Media.md5')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'originalName'); ?>
<?php echo $form->textField($model,'originalName',array('size'=>60,'maxlength'=>128)); ?>
<?php echo $form->error($model,'originalName'); ?>
<?php if('_HINT_P3Media.originalName' != $hint = Yii::t('app', '_HINT_P3Media.originalName')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'mimeType'); ?>
<?php echo $form->textField($model,'mimeType',array('size'=>60,'maxlength'=>128)); ?>
<?php echo $form->error($model,'mimeType'); ?>
<?php if('_HINT_P3Media.mimeType' != $hint = Yii::t('app', '_HINT_P3Media.mimeType')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'size'); ?>
<?php echo $form->textField($model,'size'); ?>
<?php echo $form->error($model,'size'); ?>
<?php if('_HINT_P3Media.size' != $hint = Yii::t('app', '_HINT_P3Media.size')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'info'); ?>
<?php echo $form->textArea($model,'info',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'info'); ?>
<?php if('_HINT_P3Media.info' != $hint = Yii::t('app', '_HINT_P3Media.info')) echo $hint; ?>
</div>


<?php
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => array('p3media/admin'))); 
echo CHtml::submitButton(Yii::t('app', 'Save')); 
$this->endWidget(); ?>
</div> <!-- form -->
