<li class="span3">
    <span class="thumbnail" rel="tooltip" data-title="<?php echo "#" . $data->id ?>">
    <h5><?php echo $data->title ?></h5>

    <div>
        <?php $this->widget('bootstrap.widgets.TbButtonGroup',
                            array('buttons' => array(
                                array(
                                    'icon' => 'eye-open',
                                    'url' => array('p3Media/view', 'id' => $data->id,
                                                   'returnUrl' => $this->createUrl("", $_GET))
                                ),
                                array(
                                    'icon' => 'pencil',
                                    'url' => array('p3Media/update', 'id' => $data->id,
                                                   'returnUrl' => $this->createUrl("", $_GET))
                                ),
                                array(
                                    'icon' => 'info-sign',
                                    'url' => array('p3MediaMeta/update', 'id' => $data->id,
                                                   'returnUrl' => $this->createUrl("", $_GET))
                                ))
                            )); ?>
    </div>

        <?php
        echo CHtml::link(
            CHtml::image(
                Yii::app()->controller->createUrl(
                    "/p3media/file/image",
                    array("id" => $data->id, "preset" => "p3media-ckbrowse")),
                $data->title,
                array("class" => "280x180")),
            array('p3Media/update', 'id' => $data->id, 'return_url' => $this->createUrl('/p3media/default/manager'))
        );
        ?>

        <div class="ui-helper-clearfix"></div>

</li>