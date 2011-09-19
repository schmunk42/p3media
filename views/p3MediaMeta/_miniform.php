<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'p3-media-meta-form',
	'enableAjaxValidation'=>true,
)); 
	echo $form->errorSummary($model);
?>
<div class="row">
<?php echo $form->labelEx($model,'status'); ?>
<?php echo $form->textField($model,'status'); ?>
<?php echo $form->error($model,'status'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'type'); ?>
<?php echo $form->textField($model,'type',array('size'=>60,'maxlength'=>64)); ?>
<?php echo $form->error($model,'type'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'language'); ?>
<?php echo $form->textField($model,'language',array('size'=>8,'maxlength'=>8)); ?>
<?php echo $form->error($model,'language'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'treePosition'); ?>
<?php echo $form->textField($model,'treePosition'); ?>
<?php echo $form->error($model,'treePosition'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'begin'); ?>
<?php echo $form->textField($model,'begin'); ?>
<?php echo $form->error($model,'begin'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'end'); ?>
<?php echo $form->textField($model,'end'); ?>
<?php echo $form->error($model,'end'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'keywords'); ?>
<?php echo $form->textArea($model,'keywords',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'keywords'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'customData'); ?>
<?php echo $form->textArea($model,'customData',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'customData'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'label'); ?>
<?php echo $form->textField($model,'label'); ?>
<?php echo $form->error($model,'label'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'owner'); ?>
<?php echo $form->textField($model,'owner',array('size'=>60,'maxlength'=>64)); ?>
<?php echo $form->error($model,'owner'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'checkAccessCreate'); ?>
<?php echo $form->textField($model,'checkAccessCreate',array('size'=>60,'maxlength'=>256)); ?>
<?php echo $form->error($model,'checkAccessCreate'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'checkAccessRead'); ?>
<?php echo $form->textField($model,'checkAccessRead',array('size'=>60,'maxlength'=>256)); ?>
<?php echo $form->error($model,'checkAccessRead'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'checkAccessUpdate'); ?>
<?php echo $form->textField($model,'checkAccessUpdate',array('size'=>60,'maxlength'=>256)); ?>
<?php echo $form->error($model,'checkAccessUpdate'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'checkAccessDelete'); ?>
<?php echo $form->textField($model,'checkAccessDelete',array('size'=>60,'maxlength'=>256)); ?>
<?php echo $form->error($model,'checkAccessDelete'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'createdAt'); ?>
<?php echo $form->textField($model,'createdAt'); ?>
<?php echo $form->error($model,'createdAt'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'createdBy'); ?>
<?php echo $form->textField($model,'createdBy',array('size'=>60,'maxlength'=>64)); ?>
<?php echo $form->error($model,'createdBy'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'modifiedAt'); ?>
<?php echo $form->textField($model,'modifiedAt'); ?>
<?php echo $form->error($model,'modifiedAt'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'modifiedBy'); ?>
<?php echo $form->textField($model,'modifiedBy',array('size'=>60,'maxlength'=>64)); ?>
<?php echo $form->error($model,'modifiedBy'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'guid'); ?>
<?php echo $form->textField($model,'guid',array('size'=>60,'maxlength'=>64)); ?>
<?php echo $form->error($model,'guid'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'ancestor_guid'); ?>
<?php echo $form->textField($model,'ancestor_guid',array('size'=>60,'maxlength'=>64)); ?>
<?php echo $form->error($model,'ancestor_guid'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'model'); ?>
<?php echo $form->textField($model,'model',array('size'=>60,'maxlength'=>128)); ?>
<?php echo $form->error($model,'model'); ?>
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
