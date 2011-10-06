<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
)); ?>

        <div class="row">
                <?php echo $form->label($model,'id'); ?>
                <?php echo $form->dropDownList($model,'id',CHtml::listData(P3Media::model()->findAll(), 'id', '_label'),array('prompt'=>Yii::t('app', 'All'))); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'status'); ?>
                <?php $form->textField($model,'status'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'type'); ?>
                <?php $form->textField($model,'type',array('size'=>60,'maxlength'=>64)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'language'); ?>
                <?php $form->textField($model,'language',array('size'=>8,'maxlength'=>8)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'treeParent_id'); ?>
                <?php echo $form->dropDownList($model,'treeParent_id',CHtml::listData(P3MediaMeta::model()->findAll(), 'id', '_label'),array('prompt'=>Yii::t('app', 'All'))); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'treePosition'); ?>
                <?php $form->textField($model,'treePosition'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'begin'); ?>
                <?php $form->textField($model,'begin'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'end'); ?>
                <?php $form->textField($model,'end'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'keywords'); ?>
                <?php $form->textArea($model,'keywords',array('rows'=>6, 'cols'=>50)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'customData'); ?>
                <?php $form->textArea($model,'customData',array('rows'=>6, 'cols'=>50)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'label'); ?>
                <?php $form->textField($model,'label'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'owner'); ?>
                <?php $form->textField($model,'owner',array('size'=>60,'maxlength'=>64)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'checkAccessCreate'); ?>
                <?php $form->textField($model,'checkAccessCreate',array('size'=>60,'maxlength'=>256)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'checkAccessRead'); ?>
                <?php $form->textField($model,'checkAccessRead',array('size'=>60,'maxlength'=>256)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'checkAccessUpdate'); ?>
                <?php $form->textField($model,'checkAccessUpdate',array('size'=>60,'maxlength'=>256)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'checkAccessDelete'); ?>
                <?php $form->textField($model,'checkAccessDelete',array('size'=>60,'maxlength'=>256)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'createdAt'); ?>
                <?php $form->textField($model,'createdAt'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'createdBy'); ?>
                <?php $form->textField($model,'createdBy',array('size'=>60,'maxlength'=>64)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'modifiedAt'); ?>
                <?php $form->textField($model,'modifiedAt'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'modifiedBy'); ?>
                <?php $form->textField($model,'modifiedBy',array('size'=>60,'maxlength'=>64)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'guid'); ?>
                <?php $form->textField($model,'guid',array('size'=>60,'maxlength'=>64)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'ancestor_guid'); ?>
                <?php $form->textField($model,'ancestor_guid',array('size'=>60,'maxlength'=>64)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'model'); ?>
                <?php $form->textField($model,'model',array('size'=>60,'maxlength'=>128)); ?>
        </div>
    
        <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
