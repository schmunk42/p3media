<div class="wide form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
)); ?>

                    <div class="row">
            <?php echo $form->label($model,'id'); ?>
                            <?php echo $form->textField($model,'id'); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'title'); ?>
                            <?php echo $form->textField($model,'title',array('size'=>32,'maxlength'=>32)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'description'); ?>
                            <?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'type'); ?>
                            <?php echo $form->textField($model,'type'); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'path'); ?>
                            <?php echo $form->textField($model,'path',array('size'=>60,'maxlength'=>255)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'md5'); ?>
                            <?php echo $form->textField($model,'md5',array('size'=>32,'maxlength'=>32)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'originalName'); ?>
                            <?php echo $form->textField($model,'originalName',array('size'=>60,'maxlength'=>128)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'mimeType'); ?>
                            <?php echo $form->textField($model,'mimeType',array('size'=>60,'maxlength'=>128)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'size'); ?>
                            <?php echo $form->textField($model,'size'); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'info'); ?>
                            <?php echo $form->textArea($model,'info',array('rows'=>6, 'cols'=>50)); ?>
                    </div>

        <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('P3MediaModule.crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
