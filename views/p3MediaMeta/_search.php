<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
)); ?>

        <div class="row">
                <?php echo $form->label($model,'id'); ?>
                <?php echo $form->dropDownList($model,'id',CHtml::listData(P3Media::model()->findAll(), 'id', 'recordTitle'),array('prompt'=>Yii::t('app', 'All'))); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'parent_id'); ?>
                <?php echo $form->dropDownList($model,'parent_id',CHtml::listData(P3MediaMeta::model()->findAll(), 'id', 'recordTitle'),array('prompt'=>Yii::t('app', 'All'))); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'owner'); ?>
                <?php echo $form->textField($model,'owner'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'language'); ?>
                <?php echo $form->textField($model,'language',array('size'=>8,'maxlength'=>8)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'status'); ?>
                <?php echo $form->textField($model,'status'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'type'); ?>
                <?php echo $form->textField($model,'type',array('size'=>45,'maxlength'=>45)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'checkAccess'); ?>
                <?php echo $form->textField($model,'checkAccess',array('size'=>60,'maxlength'=>128)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'begin'); ?>
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
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'end'); ?>
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
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'createdAt'); ?>
                <?php echo $form->textField($model,'createdAt'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'createdBy'); ?>
                <?php echo $form->textField($model,'createdBy',array('size'=>32,'maxlength'=>32)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'modifiedAt'); ?>
                <?php echo $form->textField($model,'modifiedAt'); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'modifiedBy'); ?>
                <?php echo $form->textField($model,'modifiedBy',array('size'=>32,'maxlength'=>32)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'keywords'); ?>
                <?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>255)); ?>
        </div>
    
        <div class="row">
                <?php echo $form->label($model,'customData'); ?>
                <?php echo $form->textArea($model,'customData',array('rows'=>6, 'cols'=>50)); ?>
        </div>
    
        <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
