<div id="p3media-default-browser">
    <?php
    $this->breadcrumbs = array(
        $this->module->id => array("/" . $this->module->id),
        Yii::t('P3MediaModule.module', 'Browser')
    );
    ?>

    <?php
    $this->widget(
        'TbBreadcrumbs',
        array(
             'links' => $this->breadcrumbs
        )
    );
    ?>


    <h1>
        <?php echo Yii::t('P3MediaModule.module', 'Media'); ?>
        <small><?php echo Yii::t('P3MediaModule.module', 'Browser'); ?></small>
    </h1>

    <?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'upload-modal')); ?>
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4>Upload</h4>

        <p>Drag & drop files here or select them with 'Add Files...'</p>
    </div>

    <div class="modal-body">
        <p><?php $this->widget('jquery-file-upload-widget.EFileUpload'); ?></p>
    </div>

    <div class="modal-footer">
        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                 'type'  => 'primary',
                 'icon'  => 'refresh white',
                 'label' => Yii::t('P3MediaModule.module', 'Browser'),
                 'url'   => array(''),
                 #'htmlOptions' => array('data-dismiss' => 'modal'),
            )
        ); ?>
    </div>
    <?php $this->endWidget(); ?>

    <div class="btn-toolbar">
        <?php
        $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                 'label'       => Yii::t('P3MediaModule.module', 'Upload'),
                 'icon'        => 'circle-arrow-up',
                 'htmlOptions' => array(
                     'data-toggle' => 'modal',
                     'data-target' => '#upload-modal',
                 ),
                 'active'      => false
            )
        );
        ?>

        <?php
        $this->widget(
            'bootstrap.widgets.TbButtonGroup',
            array(
                 #'size'=>'large',
                 #'type'=>'inverse', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                 'buttons' => array(
                     array(
                         'label'  => Yii::t('P3MediaModule.module', 'Uploaded Files'),
                         'icon'   => 'inbox',
                         'url'    => array("/p3media/default/browser"),
                         'active' => false
                     ),
                     array(
                         #'class' => 'TbMenu',
                         'label' => Yii::t('P3MediaModule.module', 'Folders'),
                         'icon'  => 'folder-open',
                         'items' => $directories
                     )
                 ),
            )
        );
        ?>


        <?php
        $this->widget(
            'bootstrap.widgets.TbButtonGroup',
            array(
                 'buttons' => array(
                     array(
                         'label'       => Yii::t('P3MediaModule.module', 'Create File'),
                         'icon'        => 'plus',
                         'url'         => array(
                             'p3Media/create',
                             'P3Media'   => array('type' => P3Media::TYPE_FILE),
                             'returnUrl' => $this->createUrl("", $_GET)
                         ),
                         'htmlOptions' => array('class' => 'btn')
                     ),
                     array(
                         'label'       => Yii::t('P3MediaModule.module', 'Create Folder'),
                         'icon'        => 'plus',
                         'url'         => array(
                             'p3Media/create',
                             'P3Media'   => array('type' => P3Media::TYPE_FOLDER),
                             'returnUrl' => $this->createUrl("", $_GET)
                         ),
                         'htmlOptions' => array('class' => 'btn')
                     )
                 )
            )
        );
        ?>

        <?php
        $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                 'label'       => Yii::t('P3MediaModule.module', 'Manage'),
                 'icon'        => 'list',
                 'url'         => array(
                     'p3Media/admin',
                     'returnUrl' => $this->createUrl("", $_GET)
                 ),
                 'htmlOptions' => array('class' => 'btn')
            )
        );
        ?>


        <div class="form-search" style="display: inline-block">
            <?php $form = $this->beginWidget('CActiveForm', array('method' => 'get')); ?>
            <?php echo $form->textField($files, 'default_title', array('size' => 12, 'maxlength' => 32, 'class' => '')); ?>
            <?php echo CHtml::submitButton(Yii::t('P3MediaModule.module', 'Search'), array('class' => 'btn')); ?>
            <?php $this->endWidget(); ?>
        </div>
    </div>

    <style type="text/css">
        .files li.span3 .thumbnail-wrapper {
            height: 210px;
            text-align: center;
        }
    </style>

    <div class="">
        <div class="span12">
            <div class="files">

                <?php
                $dataProvider = $files->search();
                $dataProvider->pagination->pageSize = 8;
                $this->widget(
                    'bootstrap.widgets.TbThumbnails',
                    array(
                         'ajaxUpdate'         => false, // TODO: ajax update not compatible with EditableField
                         'dataProvider'       => $dataProvider,
                         'template'           => "{sorter}<br/>\n{pager}\n{items}\n{pager}\n{summary}", // TODO: fix template (no br)
                         'sortableAttributes' => array(
                             'title' => Yii::t('P3MediaModule.module', 'Title'),
                             'id'    => Yii::t('P3MediaModule.module', 'ID')
                         ),
                         'pager'              => array(
                             'class'               => 'TbPager',
                             'displayFirstAndLast' => true,
                         ),
                         'itemView'           => '_thumb',
                         // Remove the existing tooltips and rebind the plugin after each ajax-call.
                    )
                );
                ?>

            </div>
        </div>
    </div>
</div>

