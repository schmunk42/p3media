<div class="crud-form">

    
    <?php
        Yii::app()->bootstrap->registerAssetCss('../select2/select2.css');
        Yii::app()->bootstrap->registerAssetJs('../select2/select2.js');
        Yii::app()->clientScript->registerScript('crud/variant/update','$(".crud-form select").select2();');

        $form=$this->beginWidget('TbActiveForm', array(
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
        <div class="span7">
            <h2>
                <?php echo Yii::t('crud','Data')?>                <small>
                    <?php echo $model->itemLabel ?>
                </small>

            </h2>


            <div class="form-horizontal">

                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php  ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->renderPartial('columns/id', array('model' => $model, 'form' => $form));
                            echo $form->error($model,'id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.id')) != 'help.id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'status') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->dropDownList($model,'status',P3Media::optsstatus(),array('empty'=>'undefined'));;
                            echo $form->error($model,'status')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.status')) != 'help.status')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'type') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->dropDownList($model,'type',P3Media::optstype(),array('empty'=>'undefined'));;
                            echo $form->error($model,'type')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.type')) != 'help.type')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'name_id') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'name_id', array('size' => 60, 'maxlength' => 64));
                            echo $form->error($model,'name_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.name_id')) != 'help.name_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'default_title') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'default_title', array('size' => 60, 'maxlength' => 255));
                            echo $form->error($model,'default_title')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.default_title')) != 'help.default_title')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'default_description') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textArea($model, 'default_description', array('rows' => 6, 'cols' => 50));
                            echo $form->error($model,'default_description')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.default_description')) != 'help.default_description')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'tree_parent_id') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->widget(
                '\GtcRelation',
                array(
                    'model' => $model,
                    'relation' => 'treeParent',
                    'fields' => 'itemLabel',
                    'allowEmpty' => true,
                    'style' => 'dropdownlist',
                    'htmlOptions' => array(
                        'checkAll' => 'all'
                    ),
                )
                );
                            echo $form->error($model,'tree_parent_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.tree_parent_id')) != 'help.tree_parent_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'tree_position') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model, 'tree_position');
                            echo $form->error($model,'tree_position')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.tree_position')) != 'help.tree_position')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'custom_data_json') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            $this->widget(
                'jsonEditorView.JuiJSONEditorInput',
                array(
                     'model'     => $model,
                     'attribute' => 'custom_data_json'
                )
            );;
                            echo $form->error($model,'custom_data_json')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.custom_data_json')) != 'help.custom_data_json')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'original_name') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model,'original_name',array('disabled'=>'disabled'));
                            echo $form->error($model,'original_name')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.original_name')) != 'help.original_name')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'path') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model,'path',array('disabled'=>'disabled'));
                            echo $form->error($model,'path')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.path')) != 'help.path')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'hash') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model,'hash',array('disabled'=>'disabled'));
                            echo $form->error($model,'hash')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.hash')) != 'help.hash')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'mime_type') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model,'mime_type',array('disabled'=>'disabled'));
                            echo $form->error($model,'mime_type')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.mime_type')) != 'help.mime_type')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'size') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model,'size',array('disabled'=>'disabled'));
                            echo $form->error($model,'size')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.size')) != 'help.size')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'info_php_json') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo CVarDumper::dumpAsString(CJSON::decode($model->info_php_json), 5, true);
                            echo $form->error($model,'info_php_json')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.info_php_json')) != 'help.info_php_json')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'info_image_magick_json') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo CVarDumper::dumpAsString(CJSON::decode($model->info_image_magick_json), 5, true);
                            echo $form->error($model,'info_image_magick_json')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.info_image_magick_json')) != 'help.info_image_magick_json')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'access_owner') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model,'access_owner',array('disabled'=>'disabled'));
                            echo $form->error($model,'access_owner')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.access_owner')) != 'help.access_owner')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'access_domain') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->dropDownList($model,'access_domain',P3Media::optsaccessdomain(),array('empty'=>'undefined'));;
                            echo $form->error($model,'access_domain')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.access_domain')) != 'help.access_domain')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'access_read') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->dropDownList($model,'access_read',P3Media::optsaccessread(),array('empty'=>'undefined'));;
                            echo $form->error($model,'access_read')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.access_read')) != 'help.access_read')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'access_update') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->dropDownList($model,'access_update',P3Media::optsaccessupdate(),array('empty'=>'undefined'));;
                            echo $form->error($model,'access_update')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.access_update')) != 'help.access_update')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'access_delete') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->dropDownList($model,'access_delete',P3Media::optsaccessdelete(),array('empty'=>'undefined'));;
                            echo $form->error($model,'access_delete')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.access_delete')) != 'help.access_delete')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'access_append') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->dropDownList($model,'access_append',P3Media::optsaccessappend(),array('empty'=>'undefined'));;
                            echo $form->error($model,'access_append')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.access_append')) != 'help.access_append')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'copied_from_id') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model,'copied_from_id',array('disabled'=>'disabled'));
                            echo $form->error($model,'copied_from_id')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.copied_from_id')) != 'help.copied_from_id')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'created_at') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model,'created_at',array('disabled'=>'disabled'));
                            echo $form->error($model,'created_at')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.created_at')) != 'help.created_at')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
                    <div class="control-group">
                        <div class='control-label'>
                            <?php echo $form->labelEx($model, 'updated_at') ?>
                        </div>
                        <div class='controls'>
                            <?php
                            echo $form->textField($model,'updated_at',array('disabled'=>'disabled'));
                            echo $form->error($model,'updated_at')
                            ?>
                            <span class="help-block">
                                <?php echo (($t = Yii::t('p3MediaModule.model', 'help.updated_at')) != 'help.updated_at')?$t:'' ?>
                            </span>
                        </div>
                    </div>
                
            </div>
        </div>
        <!-- main inputs -->

        
        <div class="span5"><!-- sub inputs -->
            <h2>
                <?php echo Yii::t('crud','Relations')?>
            </h2>
                                                            
                <h3>
                    <?php echo Yii::t('p3MediaModule.model', 'P3Medias'); ?>
                </h3>
                <?php echo '<i>'.Yii::t('crud','Switch to view mode to edit related records.').'</i>' ?>
                                                            
                <h3>
                    <?php echo Yii::t('p3MediaModule.model', 'P3MediaTranslations'); ?>
                </h3>
                <?php echo '<i>'.Yii::t('crud','Switch to view mode to edit related records.').'</i>' ?>
                            
        </div>
        <!-- sub inputs -->
    </div>

    <p class="alert">
        <?php echo Yii::t('crud','Fields with <span class="required">*</span> are required.');?>
    </p>

    <!-- TODO: We need the buttons inside the form, when a user hits <enter> -->
    <div class="form-actions" style="visibility: hidden; height: 1px">
        
        <?php
            echo CHtml::Button(
            Yii::t('crud', 'Cancel'), array(
                'submit' => (isset($_GET['returnUrl']))?$_GET['returnUrl']:array('p3Media/admin'),
                'class' => 'btn'
            ));
            echo ' '.CHtml::submitButton(Yii::t('crud', 'Save'), array(
                'class' => 'btn btn-primary'
            ));
        ?>
    </div>

    <?php $this->endWidget() ?>
</div> <!-- form -->