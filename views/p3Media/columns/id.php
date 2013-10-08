<div class="row">
    <?php
    if ($this->action->id == 'update') {
        echo $model->image('p3media-manager');
        echo "<br/>" . CHtml::link(Yii::t('P3MediaModule.module', 'Download'), $this->createUrl('/p3media/file/', array('id' => $model->id))) . "<br/>";
    }
    ?>
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