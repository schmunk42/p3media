<div class="wide form">

    <?php
    $form = $this->beginWidget('TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>
    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php $this->renderPartial('columns/id', array('model' => $model, 'form' => $form)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'status'); ?>
        <?php echo $form->dropDownList($model,'status',P3Media::optsstatus(),array('empty'=>'undefined'));; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'type'); ?>
        <?php echo $form->dropDownList($model,'type',P3Media::optstype(),array('empty'=>'undefined'));; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'name_id'); ?>
        <?php echo $form->textField($model, 'name_id', array('size' => 60, 'maxlength' => 64)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'default_title'); ?>
        <?php echo $form->textField($model, 'default_title', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'default_description'); ?>
        <?php echo $form->textArea($model, 'default_description', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'tree_parent_id'); ?>
        <?php echo $form->textField($model, 'tree_parent_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'tree_position'); ?>
        <?php echo $form->textField($model, 'tree_position'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'custom_data_json'); ?>
        <?php $this->widget(
                'jsonEditorView.JuiJSONEditorInput',
                array(
                     'model'     => $model,
                     'attribute' => 'custom_data_json'
                )
            );; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'original_name'); ?>
        <?php echo $form->textField($model,'original_name',array('disabled'=>'disabled')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'path'); ?>
        <?php echo $form->textField($model,'path',array('disabled'=>'disabled')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'hash'); ?>
        <?php echo $form->textField($model,'hash',array('disabled'=>'disabled')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'mime_type'); ?>
        <?php echo $form->textField($model,'mime_type',array('disabled'=>'disabled')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'size'); ?>
        <?php echo $form->textField($model,'size',array('disabled'=>'disabled')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'info_php_json'); ?>
        <?php echo CVarDumper::dumpAsString(CJSON::decode($model->info_php_json), 5, true); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'info_image_magick_json'); ?>
        <?php echo CVarDumper::dumpAsString(CJSON::decode($model->info_image_magick_json), 5, true); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'access_owner'); ?>
        <?php echo $form->textField($model,'access_owner',array('disabled'=>'disabled')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'access_domain'); ?>
        <?php echo $form->dropDownList($model,'access_domain',P3Media::optsaccessdomain(),array('empty'=>'undefined'));; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'access_read'); ?>
        <?php echo $form->dropDownList($model,'access_read',P3Media::optsaccessread(),array('empty'=>'undefined'));; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'access_update'); ?>
        <?php echo $form->dropDownList($model,'access_update',P3Media::optsaccessupdate(),array('empty'=>'undefined'));; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'access_delete'); ?>
        <?php echo $form->dropDownList($model,'access_delete',P3Media::optsaccessdelete(),array('empty'=>'undefined'));; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'access_append'); ?>
        <?php echo $form->dropDownList($model,'access_append',P3Media::optsaccessappend(),array('empty'=>'undefined'));; ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'copied_from_id'); ?>
        <?php echo $form->textField($model,'copied_from_id',array('disabled'=>'disabled')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'created_at'); ?>
        <?php echo $form->textField($model,'created_at',array('disabled'=>'disabled')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'updated_at'); ?>
        <?php echo $form->textField($model,'updated_at',array('disabled'=>'disabled')); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('P3MediaModule.crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
