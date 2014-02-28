<?php
$this->setPageTitle(
    Yii::t('p3MediaModule.model', 'P3 Medias')
    . ' - '
    . Yii::t('P3MediaModule.crud', 'Manage')
);

$this->breadcrumbs[] = Yii::t('p3MediaModule.model', 'P3 Medias');
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update(
            'p3-media-grid',
            {data: $(this).serialize()}
        );
        return false;
    });
    ");
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>

        <?php echo Yii::t('p3MediaModule.model', 'P3 Medias'); ?>
        <small><?php echo Yii::t('P3MediaModule.crud', 'Manage'); ?></small>

    </h1>


<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php Yii::beginProfile('P3Media.view.grid'); ?>


<?php
$this->widget('TbGridView',
    array(
        'id' => 'p3-media-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        #'responsiveTable' => true,
        'template' => '{summary}{pager}{items}{pager}',
        'pager' => array(
            'class' => 'TbPager',
            'displayFirstAndLast' => true,
        ),
        'columns' => array(
            array(
                'class' => 'CLinkColumn',
                'header' => '',
                'labelExpression' => '$data->itemLabel',
                'urlExpression' => 'Yii::app()->controller->createUrl("view", array("id" => $data["id"]))'
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'id',
                'editable' => array(
                    'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'status',
                'editable' => array(
                    'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'type',
                'editable' => array(
                    'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'name_id',
                'editable' => array(
                    'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'default_title',
                'editable' => array(
                    'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'default_description',
            array(
                'name' => 'tree_parent_id',
                'value' => 'CHtml::value($data, \'p3Medias.itemLabel\')',
                'filter' => '',//CHtml::listData(P3Media::model()->findAll(array('limit' => 1000)), 'id', 'itemLabel'),
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'tree_position',
                'editable' => array(
                    'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'custom_data_json',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'original_name',
                'editable' => array(
                    'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            /*
            array(
                'class' => 'TbEditableColumn',
                'name' => 'path',
                'editable' => array(
                    'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'hash',
                'editable' => array(
                    'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'mime_type',
                'editable' => array(
                    'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'size',
                'editable' => array(
                    'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'info_php_json',
            #'info_image_magick_json',
            array(
                'class' => 'TbEditableColumn',
                'name' => 'access_owner',
                'editable' => array(
                    'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'access_domain',
                'editable' => array(
                    'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'access_read',
                'editable' => array(
                    'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'access_update',
                'editable' => array(
                    'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'access_delete',
                'editable' => array(
                    'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'access_append',
                'editable' => array(
                    'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            array(
                'class' => 'TbEditableColumn',
                'name' => 'copied_from_id',
                'editable' => array(
                    'url' => $this->createUrl('/p3media/p3Media/editableSaver'),
                    //'placement' => 'right',
                )
            ),
            #'created_at',
            #'updated_at',
            */

            array(
                'class' => 'TbButtonColumn',
                'buttons' => array(
                    'view' => array('visible' => 'Yii::app()->user->checkAccess("P3media.P3Media.View")'),
                    'update' => array('visible' => 'Yii::app()->user->checkAccess("P3media.P3Media.Update")'),
                    'delete' => array('visible' => 'Yii::app()->user->checkAccess("P3media.P3Media.Delete")'),
                ),
                'viewButtonUrl' => 'Yii::app()->controller->createUrl("view", array("id" => $data->id))',
                'updateButtonUrl' => 'Yii::app()->controller->createUrl("update", array("id" => $data->id))',
                'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete", array("id" => $data->id))',
            ),
        )
    )
);
?>
<?php Yii::endProfile('P3Media.view.grid'); ?>