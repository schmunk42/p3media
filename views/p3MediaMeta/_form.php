<div class="form">
    <p class="note">
        <?php echo Yii::t('app','Fields with');?> <span class="required">*</span> <?php echo Yii::t('app','are required');?>        .
    </p>

    <?php
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'p3-media-meta-form',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    ));

    echo $form->errorSummary($model);
    ?>

    <div class="row">
<?php echo $form->labelEx($model,'status'); ?>

<?php echo $form->textField($model,'status'); ?>
<?php echo $form->error($model,'status'); ?>
<div class='hint'><?php if('hint.status' != $hint = Yii::t('crud-P3MediaMeta', 'hint.status')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'type'); ?>
<?php echo $form->textField($model,'type',array('size'=>60,'maxlength'=>64)); ?>
<?php echo $form->error($model,'type'); ?>
<div class='hint'><?php if('hint.type' != $hint = Yii::t('crud-P3MediaMeta', 'hint.type')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'language'); ?>
<?php echo $form->textField($model,'language',array('size'=>8,'maxlength'=>8)); ?>
<?php echo $form->error($model,'language'); ?>
<div class='hint'><?php if('hint.language' != $hint = Yii::t('crud-P3MediaMeta', 'hint.language')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'treePosition'); ?>
<?php echo $form->textField($model,'treePosition'); ?>
<?php echo $form->error($model,'treePosition'); ?>
<div class='hint'><?php if('hint.treePosition' != $hint = Yii::t('crud-P3MediaMeta', 'hint.treePosition')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'begin'); ?>
<?php echo $form->textField($model,'begin'); ?>
<?php echo $form->error($model,'begin'); ?>
<div class='hint'><?php if('hint.begin' != $hint = Yii::t('crud-P3MediaMeta', 'hint.begin')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'end'); ?>
<?php echo $form->textField($model,'end'); ?>
<?php echo $form->error($model,'end'); ?>
<div class='hint'><?php if('hint.end' != $hint = Yii::t('crud-P3MediaMeta', 'hint.end')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'keywords'); ?>
<?php echo $form->textArea($model,'keywords',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'keywords'); ?>
<div class='hint'><?php if('hint.keywords' != $hint = Yii::t('crud-P3MediaMeta', 'hint.keywords')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'customData'); ?>
<?php echo $form->textArea($model,'customData',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'customData'); ?>
<div class='hint'><?php if('hint.customData' != $hint = Yii::t('crud-P3MediaMeta', 'hint.customData')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'label'); ?>
<?php echo $form->textField($model,'label'); ?>
<?php echo $form->error($model,'label'); ?>
<div class='hint'><?php if('hint.label' != $hint = Yii::t('crud-P3MediaMeta', 'hint.label')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'owner'); ?>
<?php echo $form->textField($model,'owner',array('size'=>60,'maxlength'=>64)); ?>
<?php echo $form->error($model,'owner'); ?>
<div class='hint'><?php if('hint.owner' != $hint = Yii::t('crud-P3MediaMeta', 'hint.owner')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'checkAccessCreate'); ?>
<?php echo $form->textField($model,'checkAccessCreate',array('size'=>60,'maxlength'=>256)); ?>
<?php echo $form->error($model,'checkAccessCreate'); ?>
<div class='hint'><?php if('hint.checkAccessCreate' != $hint = Yii::t('crud-P3MediaMeta', 'hint.checkAccessCreate')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'checkAccessRead'); ?>
<?php echo $form->textField($model,'checkAccessRead',array('size'=>60,'maxlength'=>256)); ?>
<?php echo $form->error($model,'checkAccessRead'); ?>
<div class='hint'><?php if('hint.checkAccessRead' != $hint = Yii::t('crud-P3MediaMeta', 'hint.checkAccessRead')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'checkAccessUpdate'); ?>
<?php echo $form->textField($model,'checkAccessUpdate',array('size'=>60,'maxlength'=>256)); ?>
<?php echo $form->error($model,'checkAccessUpdate'); ?>
<div class='hint'><?php if('hint.checkAccessUpdate' != $hint = Yii::t('crud-P3MediaMeta', 'hint.checkAccessUpdate')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'checkAccessDelete'); ?>
<?php echo $form->textField($model,'checkAccessDelete',array('size'=>60,'maxlength'=>256)); ?>
<?php echo $form->error($model,'checkAccessDelete'); ?>
<div class='hint'><?php if('hint.checkAccessDelete' != $hint = Yii::t('crud-P3MediaMeta', 'hint.checkAccessDelete')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'createdAt'); ?>
<?php echo $form->textField($model,'createdAt'); ?>
<?php echo $form->error($model,'createdAt'); ?>
<div class='hint'><?php if('hint.createdAt' != $hint = Yii::t('crud-P3MediaMeta', 'hint.createdAt')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'createdBy'); ?>
<?php echo $form->textField($model,'createdBy',array('size'=>60,'maxlength'=>64)); ?>
<?php echo $form->error($model,'createdBy'); ?>
<div class='hint'><?php if('hint.createdBy' != $hint = Yii::t('crud-P3MediaMeta', 'hint.createdBy')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'modifiedAt'); ?>
<?php echo $form->textField($model,'modifiedAt'); ?>
<?php echo $form->error($model,'modifiedAt'); ?>
<div class='hint'><?php if('hint.modifiedAt' != $hint = Yii::t('crud-P3MediaMeta', 'hint.modifiedAt')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'modifiedBy'); ?>
<?php echo $form->textField($model,'modifiedBy',array('size'=>60,'maxlength'=>64)); ?>
<?php echo $form->error($model,'modifiedBy'); ?>
<div class='hint'><?php if('hint.modifiedBy' != $hint = Yii::t('crud-P3MediaMeta', 'hint.modifiedBy')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'guid'); ?>
<?php echo $form->textField($model,'guid',array('size'=>60,'maxlength'=>64)); ?>
<?php echo $form->error($model,'guid'); ?>
<div class='hint'><?php if('hint.guid' != $hint = Yii::t('crud-P3MediaMeta', 'hint.guid')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'ancestor_guid'); ?>
<?php echo $form->textField($model,'ancestor_guid',array('size'=>60,'maxlength'=>64)); ?>
<?php echo $form->error($model,'ancestor_guid'); ?>
<div class='hint'><?php if('hint.ancestor_guid' != $hint = Yii::t('crud-P3MediaMeta', 'hint.ancestor_guid')) echo $hint; ?></div>
</div>

<div class="row">
<?php echo $form->labelEx($model,'model'); ?>
<?php echo $form->textField($model,'model',array('size'=>60,'maxlength'=>128)); ?>
<?php echo $form->error($model,'model'); ?>
<div class='hint'><?php if('hint.model' != $hint = Yii::t('crud-P3MediaMeta', 'hint.model')) echo $hint; ?></div>
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

<div class="row">
<label for="treeParent"><?php echo Yii::t('app', 'TreeParent'); ?></label>
<?php $this->widget(
					'Relation',
					array(
							'model' => $model,
							'relation' => 'treeParent',
							'fields' => 'status',
							'allowEmpty' => true,
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
