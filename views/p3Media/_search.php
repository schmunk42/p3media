<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
)); ?>

        <div class="row">
                <?php echo $form->label($model,'id'); ?>
                <?php $form->textField($model,'id'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'title'); ?>
                <?php $form->textField($model,'title',array('size'=>32,'maxlength'=>32)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'description'); ?>
                <?php $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'type'); ?>
                <?php $form->textField($model,'type'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'path'); ?>
                <?php $form->textField($model,'path',array('size'=>60,'maxlength'=>255)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'md5'); ?>
                <?php $form->textField($model,'md5',array('size'=>32,'maxlength'=>32)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'originalName'); ?>
                <?php $form->textField($model,'originalName',array('size'=>60,'maxlength'=>128)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'mimeType'); ?>
                <?php $form->textField($model,'mimeType',array('size'=>60,'maxlength'=>128)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'size'); ?>
                <?php $form->textField($model,'size'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'info'); ?>
                <?php $form->textArea($model,'info',array('rows'=>6, 'cols'=>50)); ?>
        </div>
    
        <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
