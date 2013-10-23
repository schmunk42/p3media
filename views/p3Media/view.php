<?php
    $this->setPageTitle(
        Yii::t('p3MediaModule.model', 'P3 Media')
        . ' - '
        . Yii::t('P3MediaModule.crud', 'View')
        . ': '   
        . $model->getItemLabel()            
);    
$this->breadcrumbs[Yii::t('p3MediaModule.model','P3 Medias')] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view','id' => $model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('P3MediaModule.crud', 'View');
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
    <h1>
        <?php echo Yii::t('p3MediaModule.model','P3 Media')?>
        <small>
            <?php echo $model->itemLabel ?>

        </small>

        </h1>



<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>


<div class="row">
    <div class="span7">
        <h2>
            <?php echo Yii::t('P3MediaModule.crud','Data')?>            <small>
                #<?php echo $model->id ?>            </small>
        </h2>

        <?php
        $this->widget(
            'TbDetailView',
            array(
                'data' => $model,
                'attributes' => array(
                array(
                        'name' => 'Image',
                        'type' => 'raw',
                        'value' => $model->image('p3media-manager')
                    ),
array(
                        'name'=>'status',
                        'type' => 'raw',
                        'value' =>$this->widget(
                            'TbEditableField',
                            array(
                                'model'=>$model,
                                'emptytext' => 'Click to select',
                                'type' => 'select',
                                'source' => P3Media::optsstatus(),
                                'attribute'=>'status',
                                'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                                'select2' => array(
                                    'placeholder' => 'Select...',
                                    'allowClear' => true
                                )
                            ),
                            true
                        )
                    ),
array(
                        'name'=>'type',
                        'type' => 'raw',
                        'value' =>$this->widget(
                            'TbEditableField',
                            array(
                                'model'=>$model,
                                'emptytext' => 'Click to select',
                                'type' => 'select',
                                'source' => P3Media::optstype(),
                                'attribute'=>'type',
                                'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                                'select2' => array(
                                    'placeholder' => 'Select...',
                                    'allowClear' => true
                                )
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'name_id',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'name_id',
                                'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'default_title',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'default_title',
                                'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'default_description',
                        'type' => 'raw',
                        'value' => $model->default_description
                    ),
        array(
            'name' => 'tree_parent_id',
            'value' => ($model->treeParent !== null)?CHtml::link(
                            '<i class="icon icon-circle-arrow-left"></i> '.$model->treeParent->itemLabel,
                            array('/p3media/p3Media/view','id' => $model->treeParent->id),
                            array('class' => '')).' '.CHtml::link(
                            '<i class="icon icon-pencil"></i> ',
                            array('/p3media/p3Media/update','id' => $model->treeParent->id),
                            array('class' => '')):'n/a',
            'type' => 'html',
        ),
array(
                        'name' => 'tree_position',
                        'type' => 'raw',
                        'value' => $this->widget(
                            'TbEditableField',
                            array(
                                'model' => $model,
                                'attribute' => 'tree_position',
                                'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'custom_data_json',
                        'type' => 'raw',
                        'value' => $model->custom_data_json
                    ),
array(
                        'name' => 'original_name',
                        'type' => 'raw',
                        'value' => $model->original_name
                    ),
array(
                        'name' => 'path',
                        'type' => 'raw',
                        'value' => $model->path
                    ),
array(
                        'name' => 'hash',
                        'type' => 'raw',
                        'value' => $model->hash
                    ),
array(
                        'name' => 'mime_type',
                        'type' => 'raw',
                        'value' => $model->mime_type
                    ),
array(
                        'name' => 'size',
                        'type' => 'raw',
                        'value' => $model->size
                    ),
array(
                        'name' => 'Image',
                        'type' => 'raw',
                        'value' => CVarDumper::dumpAsString(CJSON::decode($model->info_php_json), 5, true)
                    ),
array(
                        'name' => 'Image',
                        'type' => 'raw',
                        'value' => CVarDumper::dumpAsString(CJSON::decode($model->info_image_magick_json), 5, true)
                    ),
array(
                        'name' => 'access_owner',
                        'type' => 'raw',
                        'value' => $model->access_owner
                    ),
array(
                        'name'=>'access_domain',
                        'type' => 'raw',
                        'value' =>$this->widget(
                            'TbEditableField',
                            array(
                                'model'=>$model,
                                'emptytext' => 'Click to select',
                                'type' => 'select',
                                'source' => P3Media::optsaccessdomain(),
                                'attribute'=>'access_domain',
                                'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                                'select2' => array(
                                    'placeholder' => 'Select...',
                                    'allowClear' => true
                                )
                            ),
                            true
                        )
                    ),
array(
                        'name' => 'access_read',
                        'type' => 'raw',
                        'value' => $model->access_read
                    ),
array(
                        'name' => 'access_update',
                        'type' => 'raw',
                        'value' => $model->access_update
                    ),
array(
                        'name' => 'access_delete',
                        'type' => 'raw',
                        'value' => $model->access_delete
                    ),
array(
                        'name' => 'access_append',
                        'type' => 'raw',
                        'value' => $model->access_append
                    ),
array(
                        'name' => 'copied_from_id',
                        'type' => 'raw',
                        'value' => $model->copied_from_id
                    ),
array(
                        'name' => 'created_at',
                        'type' => 'raw',
                        'value' => $model->created_at
                    ),
array(
                        'name' => 'updated_at',
                        'type' => 'raw',
                        'value' => $model->updated_at
                    ),
           ),
        )); ?>
    </div>


    <div class="span5">
        <div class="well">
            <?php $this->renderPartial('_view-relations',array('model' => $model)); ?>        </div>
    </div>
</div>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>