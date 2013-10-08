<div class="ckeditor">
    <h1><?php echo Yii::t('P3MediaModule.module', 'Media'); ?>
        <small><?php echo Yii::t('P3MediaModule.module', 'CKEditor Browser'); ?></small>
    </h1>

    <div class="row">
        <div class="span4">
            <h3><?php echo Yii::t('P3MediaModule.module', '1. Choose Format'); ?></h3>

            <p>
                <?php
                foreach ($this->module->params['presets'] AS $key => $preset) {

                    // skip presets without name
                    if (empty($preset['name'])) continue;

                    $identifier        = $key . ((isset($preset['type'])) ? '|' . $preset['type'] : '');
                    $data[$identifier] = (isset($preset['name'])) ? $preset['name'] : $key;
                }
                echo CHtml::dropDownList("preset", $defaultPreset, $data, array("class" => "span3 btn"));
                ?>

            </p>


        </div>
        <div class="span8">

            <div class="well form-inline">
                <?php
                $form = $this->beginWidget(
                    'CActiveForm',
                    array(
                         //'action'=>Yii::app()->createUrl($this->route),
                         'method' => 'get',
                    )
                );
                ?>

                <?php
                #echo CHtml::link(Yii::t('P3MediaModule.module', 'Advanced Search'), '#', array('class' => 'search-button'));
                #echo " ";
                echo CHtml::link(
                    Yii::t('P3MediaModule.module', 'Upload'),
                    array('/p3media/import/upload'),
                    array(
                         'target' => '_blank',
                         'class'  => 'btn'
                    )
                );
                echo " ";
                echo CHtml::link(
                    Yii::t('P3MediaModule.module', 'Reload'),
                    null,
                    array(
                         'target'  => '_blank',
                         'class'   => 'btn',
                         'onclick' => 'location.reload();'
                    )
                );
                ?>

                <?php echo $form->label($model, 'id'); ?>
                <?php echo $form->textField($model, 'id', array('size' => 4, 'maxlength' => 32, 'class' => 'span1')); ?>

                <?php echo $form->label($model, 'default_title'); ?>
                <?php echo $form->textField(
                    $model,
                    'default_title',
                    array(
                         'size'      => 12,
                         'maxlength' => 32,
                         'class'     => 'span2'
                    )
                ); ?>
                <?php #echo $form->label($model, 'description'); ?>
                <?php #	echo $form->textField($model, 'description', array('size' => 12, 'maxlength' => 32, 'class' => 'span2')); ?>

                <!--
                <?php echo $form->label($model, 'type'); ?>
                <?php echo $form->textField($model, 'type', array('size' => 12, 'maxlength' => 32,
                                                                  'class' => 'span1')); ?>-->


                <?php echo CHtml::submitButton(Yii::t('P3MediaModule.module', 'Search')); ?>




                <?php $this->endWidget(); ?>


            </div>
            <!-- search-form -->
        </div>


    </div>

    <h3><?php echo Yii::t('P3MediaModule.module', '2. Choose File'); ?></h3>

    <div class="row">
        <div class="span12">
            <?php
            $dataProvider = $model->search();
            $dataProvider->pagination->pageSize = 12;
            $this->widget(
                'bootstrap.widgets.TbThumbnails',
                array(
                     'dataProvider'    => $dataProvider,
                     'template'        => "{pager}\n{items}",
                     'pager'           => array(
                         'class'               => 'TbPager',
                         'displayFirstAndLast' => true,
                     ),
                     'itemView'        => '_thumb',
                     // Remove the existing tooltips and rebind the plugin after each ajax-call.
                     'afterAjaxUpdate' => "js:function() {
        jQuery('.tooltip').remove();
        jQuery('a[rel=tooltip]').tooltip();
    }",
                )
            );
            ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    function select(id, title) {
        if ($('#preset').val() == '') {
            alert("<?php echo Yii::t('P3MediaModule.module', 'Please choose an image preset.') ?>");
            return false;
        }
        var identifier = $('#preset').val();
        if (confirm('Select #' + id + ' as \'' + identifier + '\'?')) {
            //alert(id+'-'+preset);
            var split;
            split = identifier.split('|')
            var preset = split[0];
            var extension = '.' + split[1]; // TODO: retrieve type from PHP preset
            //var title = 'p3media'; // TODO
            url = '<?php echo CController::createUrl('/p3media/file/image', array('title' => '__TITLE__',
                                                                                  'id' => '__ID__',
                                                                                  'preset' => '__PRESET__',
                                                                                  'extension' => '__EXT__')) ?>';
            url = url.replace('__TITLE__', title);
            url = url.replace('__EXT__', extension);
            url = url.replace('__PRESET__', preset);
            url = url.replace('__ID__', id);
            //alert (url);
            window.opener.CKEDITOR.tools.callFunction(<?php echo $_REQUEST['CKEditorFuncNum'] ?>, url);
            window.close();
        }
        ;
    }
</script>
