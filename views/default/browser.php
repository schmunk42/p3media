<?php
$this->breadcrumbs = array(
    $this->module->id => array("/" . $this->module->id),
    Yii::t('P3MediaModule.crud', 'Browser')
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
    <?php echo Yii::t('P3MediaModule.crud', 'Media'); ?>
    <small><?php echo Yii::t('P3MediaModule.crud', 'Browser'); ?></small>
</h1>

<div class="btn-toolbar">
    <?php
    $this->widget(
        'bootstrap.widgets.TbButton',
        array(
             'label'       => Yii::t('P3MediaModule.crud', 'Manage'),
             'icon'        => 'list',
             'url'         => array(
                 'p3Media/admin',
                 'returnUrl' => $this->createUrl("", $_GET)
             ),
             'htmlOptions' => array('class' => 'btn')
        )
    );
    ?>

    <?php
    $this->widget(
        'bootstrap.widgets.TbButton',
        array(
             'label'       => Yii::t('P3MediaModule.crud', 'Upload Files'),
             'icon'        => 'circle-arrow-up',
             'url'         => array(
                 '/p3media/import/upload',
                 'returnUrl' => $this->createUrl("", $_GET)
             ),
             'htmlOptions' => array('class' => 'btn')
        )
    );
    ?>

    <?php
    $this->widget(
        'bootstrap.widgets.TbButton',
        array(
             'label'       => Yii::t('P3MediaModule.crud', 'Create File'),
             'icon'        => 'plus',
             'url'         => array(
                 'p3Media/create',
                 'P3Media'   => array('type' => 1),
                 'returnUrl' => $this->createUrl("", $_GET)
             ),
             'htmlOptions' => array('class' => 'btn')
        )
    );
    ?>
    <?php
    $this->widget(
        'bootstrap.widgets.TbButton',
        array(
             'label'       => Yii::t('P3MediaModule.crud', 'Create Folder'),
             'icon'        => 'plus',
             'url'         => array(
                 'p3Media/create',
                 'P3Media'   => array('type' => 2),
                 'returnUrl' => $this->createUrl("", $_GET)
             ),
             'htmlOptions' => array('class' => 'btn')
        )
    );
    ?>

    <div class="form-inline" style="display: inline-block">
        <?php $form = $this->beginWidget('CActiveForm', array('method' => 'get')); ?>

        <?php echo $form->label($files, 'id'); ?>
        <?php echo $form->textField($files, 'id', array('size' => 4, 'maxlength' => 32, 'class' => '')); ?>

        <?php echo $form->label($files, 'title'); ?>
        <?php echo $form->textField($files, 'title', array('size' => 12, 'maxlength' => 32, 'class' => '')); ?>

        <?php echo CHtml::submitButton(Yii::t('P3MediaModule.crud', 'Search'),array('class'=>'btn')); ?>

        <?php $this->endWidget(); ?>

    </div>
</div>

<style type="text/css">
    .files li.span3 .thumbnail-wrapper {
        height: 210px;
        text-align: center;
    }
</style>

<div class="directories">
    <?php
    $this->widget(
        'TbNavbar',
        array(
             'brand'    => false,
             'collapse' => false,
             'fixed'    => false,
             'items'    => array(
                 array(
                     'class' => 'TbMenu',
                     'items' => array(
                         array(
                             'label' => Yii::t('P3MediaModule.crud', 'Uploaded Files'),
                             'icon' => 'inbox white',
                             'url'   => array("/p3media/default/browser"),
                             'active' => false
                         ),
                         array(
                             'class' => 'TbMenu',
                             'label' => Yii::t('P3MediaModule.crud', 'Folders'),
                             'icon' => 'folder-open white',
                             'items' => $directories
                         )
                     ),
                 ),
                 /*array(
                     'class' => 'TbMenu',
                     'items' => array(
                         array(
                             'label'       => Yii::t('P3MediaModule.crud', 'Create File'),
                             'icon'        => 'plus',
                             'url'         => array(
                                 'p3Media/create',
                                 'P3Media'   => array('type' => 1),
                                 'returnUrl' => $this->createUrl("", $_GET)
                             ),
                             'htmlOptions' => array('class' => 'btn')
                         ),
                     )
                 ),*/

             )
        )
    );
    ?>
</div>

<?php
// show only on uploaded files tab
if (!Yii::app()->request->getParam('id')) $this->widget('jquery-file-upload-widget.EFileUpload');
?>

<div class="">
    <div class="span12">
        <div class="files">

            <?php
            $dataProvider = $files->search();
            $dataProvider->pagination->pageSize = 9;
            $this->widget(
                'bootstrap.widgets.TbThumbnails',
                array(
                     'ajaxUpdate'         => false, // TODO: ajax update not compatible with EditableField
                     'dataProvider'       => $dataProvider,
                     'template'           => "{pager}\n{sorter}\n{items}\n{pager}\n{summary}",
                     'sortableAttributes' => array(
                         'title' => Yii::t('P3MediaModule.crud', 'Title'),
                         'id'    => Yii::t('P3MediaModule.crud', 'ID')
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