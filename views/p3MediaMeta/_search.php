<div class="wide form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
)); ?>

                    <div class="row">
            <?php echo $form->label($model,'id'); ?>
                            <?php echo $form->dropDownList($model,'id',CHtml::listData(P3Media::model()->findAll(), 'id', 'title'),array('prompt'=>Yii::t('P3MediaModule.crud', 'All'))); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'status'); ?>
                            <?php echo $form->textField($model,'status'); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'type'); ?>
                            <?php echo $form->textField($model,'type',array('size'=>60,'maxlength'=>64)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'language'); ?>
                            <?php echo $form->textField($model,'language',array('size'=>8,'maxlength'=>8)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'treeParent_id'); ?>
                            <?php echo $form->dropDownList($model,'treeParent_id',CHtml::listData(P3MediaMeta::model()->findAll(), 'id', 'status'),array('prompt'=>Yii::t('P3MediaModule.crud', 'All'))); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'treePosition'); ?>
                            <?php echo $form->textField($model,'treePosition'); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'begin'); ?>
                            <?php echo $form->textField($model,'begin'); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'end'); ?>
                            <?php echo $form->textField($model,'end'); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'keywords'); ?>
                            <?php echo $form->textArea($model,'keywords',array('rows'=>6, 'cols'=>50)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'customData'); ?>
                            <?php echo $form->textArea($model,'customData',array('rows'=>6, 'cols'=>50)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'label'); ?>
                            <?php echo $form->textField($model,'label'); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'owner'); ?>
                            <?php echo $form->textField($model,'owner',array('size'=>60,'maxlength'=>64)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'checkAccessCreate'); ?>
                            <?php echo $form->textField($model,'checkAccessCreate',array('size'=>60,'maxlength'=>256)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'checkAccessRead'); ?>
                            <?php echo $form->textField($model,'checkAccessRead',array('size'=>60,'maxlength'=>256)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'checkAccessUpdate'); ?>
                            <?php echo $form->textField($model,'checkAccessUpdate',array('size'=>60,'maxlength'=>256)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'checkAccessDelete'); ?>
                            <?php echo $form->textField($model,'checkAccessDelete',array('size'=>60,'maxlength'=>256)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'createdAt'); ?>
                            <?php echo $form->textField($model,'createdAt'); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'createdBy'); ?>
                            <?php echo $form->textField($model,'createdBy',array('size'=>60,'maxlength'=>64)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'modifiedAt'); ?>
                            <?php echo $form->textField($model,'modifiedAt'); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'modifiedBy'); ?>
                            <?php echo $form->textField($model,'modifiedBy',array('size'=>60,'maxlength'=>64)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'guid'); ?>
                            <?php echo $form->textField($model,'guid',array('size'=>60,'maxlength'=>64)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'ancestor_guid'); ?>
                            <?php echo $form->textField($model,'ancestor_guid',array('size'=>60,'maxlength'=>64)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'model'); ?>
                            <?php echo $form->textField($model,'model',array('size'=>60,'maxlength'=>128)); ?>
                    </div>

        <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('P3MediaModule.crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
