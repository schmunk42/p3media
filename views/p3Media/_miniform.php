<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'p3-media-form',
	'enableAjaxValidation'=>true,
)); 
	echo $form->errorSummary($model);
?>
<div class="row">
<?php echo $form->labelEx($model,'title'); ?>
<?php echo $form->textField($model,'title',array('size'=>32,'maxlength'=>32)); ?>
<?php echo $form->error($model,'title'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'description'); ?>
<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'description'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'type'); ?>
<?php echo $form->textField($model,'type'); ?>
<?php echo $form->error($model,'type'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'path'); ?>
<?php echo $form->textField($model,'path',array('size'=>60,'maxlength'=>255)); ?>
<?php echo $form->error($model,'path'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'md5'); ?>
<?php echo $form->textField($model,'md5',array('size'=>32,'maxlength'=>32)); ?>
<?php echo $form->error($model,'md5'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'originalName'); ?>
<?php echo $form->textField($model,'originalName',array('size'=>60,'maxlength'=>128)); ?>
<?php echo $form->error($model,'originalName'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'mimeType'); ?>
<?php echo $form->textField($model,'mimeType',array('size'=>60,'maxlength'=>128)); ?>
<?php echo $form->error($model,'mimeType'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'size'); ?>
<?php echo $form->textField($model,'size'); ?>
<?php echo $form->error($model,'size'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'info'); ?>
<?php echo $form->textArea($model,'info',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'info'); ?>
</div>


<?php
echo CHtml::Button(
	Yii::t('app', 'Cancel'),
	array(
		'onClick' => "$('#".$relation."_dialog').dialog('close');"
	));
echo CHtml::Button(
	Yii::t('app', 'Create'),
	array(
		'id' => "submit_".$relation
	));
$this->endWidget(); 

?></div> <!-- form -->
