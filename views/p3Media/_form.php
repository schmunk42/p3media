<div class="form">
    <p class="note">
        <?php echo Yii::t('P3MediaModule.crud', 'Fields with');?> <span
            class="required">*</span> <?php echo Yii::t('P3MediaModule.crud', 'are required');?>.
    </p>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
                                                   'id' => 'p3-media-form',
                                                   'enableAjaxValidation' => true,
                                                   'enableClientValidation' => true,
                                                   'htmlOptions' => array(
                                                       'enctype' => 'multipart/form-data'
                                                   )
                                              ));

    echo $form->errorSummary($model);
    ?>
    <div class="row">
        <?php
        if ($this->action->id == 'update') {
            echo $model->image('p3media-ckbrowse');
            echo "<br/>" . CHtml::link(Yii::t('P3MediaModule.crud', 'Download'), $this->createUrl('/p3media/file/', array('id' => $model->id))) . "<br/>";
        }
        ?>
        <?php echo CHtml::label(Yii::t('P3MediaModule.crud', 'Upload File'), 'fileUpload'); ?>
        <div>

            <?php
            echo CHtml::fileField('fileUpload', null, array(
                                                           'style' => 'width: 100%',
                                                           'onchange' => 'if (!$("#P3Media_title").val()) $("#P3Media_title").val($("#fileUpload").val().substr(0,25)+"-"+Math.round((Math.random()*1000000)));'
                                                      )
            );
            ?>
        </div>
        <p class="hint">Maximum size: <?php echo min(ini_get('upload_max_filesize'), ini_get('post_max_size')) ?></p>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>

        <?php echo $form->textField($model, 'title', array('size' => 32, 'maxlength' => 32)); ?>
        <?php echo $form->error($model, 'title'); ?>
        <div class='hint'><?php if ('hint.title' != $hint = Yii::t('P3MediaModule.crud', 'hint.title')) {
            echo $hint;
        } ?></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'description'); ?>
        <div class='hint'><?php if ('hint.description' != $hint = Yii::t('P3MediaModule.crud', 'hint.description')) {
            echo $hint;
        } ?></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'type'); ?>
        <?php echo $form->textField($model, 'type'); ?>
        <?php echo $form->error($model, 'type'); ?>
        <div class='hint'><?php if ('hint.type' != $hint = Yii::t('P3MediaModule.crud', 'hint.type')) {
            echo $hint;
        } ?></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'path'); ?>
        <?php echo $form->textField($model, 'path', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'path'); ?>
        <div class='hint'><?php if ('hint.path' != $hint = Yii::t('P3MediaModule.crud', 'hint.path')) {
            echo $hint;
        } ?></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'md5'); ?>
        <?php echo $form->textField($model, 'md5', array('size' => 32, 'maxlength' => 32)); ?>
        <?php echo $form->error($model, 'md5'); ?>
        <div class='hint'><?php if ('hint.md5' != $hint = Yii::t('P3MediaModule.crud', 'hint.md5')) {
            echo $hint;
        } ?></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'originalName'); ?>
        <?php echo $form->textField($model, 'originalName', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'originalName'); ?>
        <div class='hint'><?php if ('hint.originalName' != $hint = Yii::t('P3MediaModule.crud', 'hint.originalName')) {
            echo $hint;
        } ?></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'mimeType'); ?>
        <?php echo $form->textField($model, 'mimeType', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'mimeType'); ?>
        <div class='hint'><?php if ('hint.mimeType' != $hint = Yii::t('P3MediaModule.crud', 'hint.mimeType')) {
            echo $hint;
        } ?></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'size'); ?>
        <?php echo $form->textField($model, 'size'); ?>
        <?php echo $form->error($model, 'size'); ?>
        <div class='hint'><?php if ('hint.size' != $hint = Yii::t('P3MediaModule.crud', 'hint.size')) {
            echo $hint;
        } ?></div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'info'); ?>
        <?php echo $form->textArea($model, 'info', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'info'); ?>
        <div class='hint'><?php if ('hint.info' != $hint = Yii::t('P3MediaModule.crud', 'hint.info')) {
            echo $hint;
        } ?></div>
    </div>

    <div class="row">
        <label for="metaData"><?php echo Yii::t('P3MediaModule.crud', 'Metadata'); ?></label>
        <?php if ($model->metaData !== null) {
        echo $model->metaData->status;
    }; ?><br/>
    </div>



    <?php
    echo CHtml::Button(Yii::t('P3MediaModule.crud', 'Cancel'), array(
                                                     'submit' => array('p3media/admin')));
    echo CHtml::submitButton(Yii::t('P3MediaModule.crud', 'Save'));
    $this->endWidget(); ?>
</div> <!-- form -->
