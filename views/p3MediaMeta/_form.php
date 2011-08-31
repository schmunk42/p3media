<div class="form">
<p class="note">
<?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>.
</p>

<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'p3-media-meta-form',
	'enableAjaxValidation'=>true,
	)); 
	echo $form->errorSummary($model);
?>
	<div class="row">
<?php echo $form->labelEx($model,'owner'); ?>
<?php echo $form->textField($model,'owner'); ?>
<?php echo $form->error($model,'owner'); ?>
<?php if('_HINT_P3MediaMeta.owner' != $hint = Yii::t('app', '_HINT_P3MediaMeta.owner')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'language'); ?>
<?php echo $form->textField($model,'language',array('size'=>8,'maxlength'=>8)); ?>
<?php echo $form->error($model,'language'); ?>
<?php if('_HINT_P3MediaMeta.language' != $hint = Yii::t('app', '_HINT_P3MediaMeta.language')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'status'); ?>
<?php echo $form->textField($model,'status'); ?>
<?php echo $form->error($model,'status'); ?>
<?php if('_HINT_P3MediaMeta.status' != $hint = Yii::t('app', '_HINT_P3MediaMeta.status')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'type'); ?>
<?php echo $form->textField($model,'type',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'type'); ?>
<?php if('_HINT_P3MediaMeta.type' != $hint = Yii::t('app', '_HINT_P3MediaMeta.type')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'checkAccess'); ?>
<?php echo $form->textField($model,'checkAccess',array('size'=>60,'maxlength'=>128)); ?>
<?php echo $form->error($model,'checkAccess'); ?>
<?php if('_HINT_P3MediaMeta.checkAccess' != $hint = Yii::t('app', '_HINT_P3MediaMeta.checkAccess')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'begin'); ?>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
						 array(
								 'model'=>'$model',
								 'name'=>'P3MediaMeta[begin]',
								 'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
								 'value'=>$model->begin,
								 'htmlOptions'=>array('size'=>10, 'style'=>'width:80px !important'),
								 'options'=>array(
									 'showButtonPanel'=>true,
									 'changeYear'=>true,
									 'changeYear'=>true,
									 'dateFormat'=>'yy-mm-dd',
									 ),
								 )
							 );
					; ?>
<?php echo $form->error($model,'begin'); ?>
<?php if('_HINT_P3MediaMeta.begin' != $hint = Yii::t('app', '_HINT_P3MediaMeta.begin')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'end'); ?>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
						 array(
								 'model'=>'$model',
								 'name'=>'P3MediaMeta[end]',
								 'language'=> substr(Yii::app()->language,0,strpos(Yii::app()->language,'_')),
								 'value'=>$model->end,
								 'htmlOptions'=>array('size'=>10, 'style'=>'width:80px !important'),
								 'options'=>array(
									 'showButtonPanel'=>true,
									 'changeYear'=>true,
									 'changeYear'=>true,
									 'dateFormat'=>'yy-mm-dd',
									 ),
								 )
							 );
					; ?>
<?php echo $form->error($model,'end'); ?>
<?php if('_HINT_P3MediaMeta.end' != $hint = Yii::t('app', '_HINT_P3MediaMeta.end')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'createdAt'); ?>
<?php echo $form->textField($model,'createdAt'); ?>
<?php echo $form->error($model,'createdAt'); ?>
<?php if('_HINT_P3MediaMeta.createdAt' != $hint = Yii::t('app', '_HINT_P3MediaMeta.createdAt')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'createdBy'); ?>
<?php echo $form->textField($model,'createdBy',array('size'=>32,'maxlength'=>32)); ?>
<?php echo $form->error($model,'createdBy'); ?>
<?php if('_HINT_P3MediaMeta.createdBy' != $hint = Yii::t('app', '_HINT_P3MediaMeta.createdBy')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'modifiedAt'); ?>
<?php echo $form->textField($model,'modifiedAt'); ?>
<?php echo $form->error($model,'modifiedAt'); ?>
<?php if('_HINT_P3MediaMeta.modifiedAt' != $hint = Yii::t('app', '_HINT_P3MediaMeta.modifiedAt')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'modifiedBy'); ?>
<?php echo $form->textField($model,'modifiedBy',array('size'=>32,'maxlength'=>32)); ?>
<?php echo $form->error($model,'modifiedBy'); ?>
<?php if('_HINT_P3MediaMeta.modifiedBy' != $hint = Yii::t('app', '_HINT_P3MediaMeta.modifiedBy')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'keywords'); ?>
<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>255)); ?>
<?php echo $form->error($model,'keywords'); ?>
<?php if('_HINT_P3MediaMeta.keywords' != $hint = Yii::t('app', '_HINT_P3MediaMeta.keywords')) echo $hint; ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'customData'); ?>
<?php echo $form->textArea($model,'customData',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'customData'); ?>
<?php if('_HINT_P3MediaMeta.customData' != $hint = Yii::t('app', '_HINT_P3MediaMeta.customData')) echo $hint; ?>
</div>

<div class="row">
<label for="parent"><?php echo Yii::t('app', 'Parent'); ?></label>
<?php $this->widget(
					'Relation',
					array(
							'model' => $model,
							'relation' => 'parent',
							'fields' => 'owner',
							'allowEmpty' => false,
							'style' => 'dropdownlist',
							'htmlOptions' => array(
								'checkAll' => Yii::t('app', 'Choose all'),
								),)
						); ?><br />
</div>

<div class="row">
<label for="id0"><?php echo Yii::t('app', 'Id0'); ?></label>
<?php $this->widget(
					'Relation',
					array(
							'model' => $model,
							'relation' => 'id0',
							'fields' => 'title',
							'allowEmpty' => false,
							'style' => 'dropdownlist',
							'htmlOptions' => array(
								'checkAll' => Yii::t('app', 'Choose all'),
								),)
						); ?><br />
</div>


<?php
echo CHtml::Button(Yii::t('app', 'Cancel'), array(
			'submit' => array('p3mediameta/admin'))); 
echo CHtml::submitButton(Yii::t('app', 'Save')); 
$this->endWidget(); ?>
</div> <!-- form -->
