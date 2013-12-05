<li class="span3">
    <span class="thumbnail" rel="tooltip" data-title="<?php echo "#" . $data->id ?>">

    <p>
        <?php
        $this->widget(
            'bootstrap.widgets.TbButtonGroup',
            array(
                 'size'    => 'mini',
                 'buttons' => array(
                     array(
                         'icon' => 'pencil white',
                         'type' => 'primary',
                         'url'  => array(
                             'p3Media/update',
                             'id'        => $data->id,
                             'returnUrl' => $this->createUrl("", $_GET)
                         )
                     ),
                     array(
                         'icon' => 'eye-open',
                         'url'  => array(
                             'p3Media/view',
                             'id'        => $data->id,
                             'returnUrl' => $this->createUrl("", $_GET)
                         ),

                     ),
                     array(
                         "type"        => "danger",
                         "icon"        => "remove white",
                         "htmlOptions" => array(
                             "submit"  => array(
                                 "p3Media/delete",
                                 "id"        => $data->id,
                                 "returnUrl" => $_SERVER['REQUEST_URI']
                             ),
                             "confirm" => Yii::t('P3MediaModule.module', 'Do you want to delete this item?')
                         )
                     )
                 )
            )
        );

        ?>
    </p>

        <div class="thumbnail-wrapper">
            <?php
            echo CHtml::link(
                CHtml::image(
                    Yii::app()->controller->createUrl(
                        "/p3media/file/image",
                        array("id" => $data->id, "preset" => "p3media-manager")
                    ),
                    $data->title,
                    array("class" => "280x180")
                ),
                array('p3Media/update', 'id' => $data->id, 'returnUrl' => $this->createUrl(''))
            );
            ?>
        </div>

        <div class="ui-helper-clearfix"></div>
    <h5>
        <i class="icon-tag"></i>
        <?php
        $this->widget(
            'TbEditableField',
            array(
                 'type'      => 'text',
                 'model'     => $data,
                 'attribute' => 'title',
                 'url'       => $this->createUrl('/p3media/p3Media/editableSaver'),
            )
        );

        ?>
    </h5>
<p>
    <i class="icon-folder-close"></i>
    <?php
    $this->widget(
        'TbEditableField',
        array(
             'type'      => 'select',
             'model'     => $data,
             'attribute' => 'tree_parent_id',
             'url'       => $this->createUrl('/p3media/p3Media/editableSaver'),
             'source'    => $this->directoriesList,
             'emptytext' => Yii::t('P3MediaModule.module', 'Select Folder')
        )
    );
    ?>
</p>
</li>