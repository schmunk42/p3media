<?php
$this->breadcrumbs = array(
    $this->module->id => array("/" . $this->module->id),
    Yii::t('P3MediaModule.crud', 'Browser')
);
?>

<?php
$this->widget('TbBreadcrumbs',
              array(
                   'links' => $this->breadcrumbs
              ));
?>


<h1>
    <?php echo Yii::t('P3MediaModule.crud', 'Media'); ?>
    <small><?php echo Yii::t('P3MediaModule.crud', 'Browser'); ?></small>
</h1>

<div class="btn-toolbar">
    <?php
    $this->widget('bootstrap.widgets.TbButton',
                  array(
                       'label'       => Yii::t('P3MediaModule.crud', 'Manage'),
                       'icon'        => 'list',
                       'url'         => array(
                           'p3Media/admin',
                           'returnUrl' => $this->createUrl("", $_GET)
                       ),
                       'htmlOptions' => array('class' => 'btn'))
    );
    ?>

    <?php
    $this->widget('bootstrap.widgets.TbButton',
                  array(
                       'label'       => Yii::t('P3MediaModule.crud', 'Upload Files'),
                       'icon'        => 'circle-arrow-up',
                       'url'         => array(
                           '/p3media/import/upload',
                           'returnUrl' => $this->createUrl("", $_GET)
                       ),
                       'htmlOptions' => array('class' => 'btn'))
    );
    ?>

    <?php
    $this->widget('bootstrap.widgets.TbButton',
                  array(
                       'label'       => Yii::t('P3MediaModule.crud', 'Create File'),
                       'icon'        => 'plus',
                       'url'         => array(
                           'p3Media/create',
                           'P3Media'   => array('type' => 1),
                           'returnUrl' => $this->createUrl("", $_GET)
                       ),
                       'htmlOptions' => array('class' => 'btn'))
    );
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton',
                  array(
                       'label'       => Yii::t('P3MediaModule.crud', 'Create Folder'),
                       'icon'        => 'plus',
                       'url'         => array(
                           'p3Media/create',
                           'P3Media'   => array('type' => 2),
                           'returnUrl' => $this->createUrl("", $_GET)
                       ),
                       'htmlOptions' => array('class' => 'btn'))
    );
    ?>

</div>

<style type="text/css">
    .files li.span3 .thumbnail-wrapper {
        height: 210px;
        text-align: center;
    }
</style>

<div class="row">
    <div class="span3">
        <div class="directories">
            <?php
            $this->widget('CMenu',
                          array(
                               'items' => array(
                                   array(
                                       'label' => Yii::t('P3MediaModule.crud', 'Root'),
                                       'url'   => array(""),
                                       'items' => $directories
                                   )
                               )
                          )
            );
            ?>
        </div>
    </div>
    <div class="span9">
        <div class="form-inline">
            <?php $form = $this->beginWidget('CActiveForm', array('method' => 'get')); ?>

            <?php echo $form->label($files, 'id'); ?>
            <?php echo $form->textField($files, 'id', array('size' => 4, 'maxlength' => 32, 'class' => 'span1')); ?>

            <?php echo $form->label($files, 'title'); ?>
            <?php echo $form->textField($files, 'title', array('size' => 12, 'maxlength' => 32, 'class' => 'span2')); ?>

            <?php echo CHtml::submitButton(Yii::t('P3MediaModule.crud', 'Search')); ?>

            <?php $this->endWidget(); ?>

        </div>
        <div class="files">

            <?php
            $dataProvider = $files->search();
            $dataProvider->pagination->pageSize = 9;
            $this->widget('bootstrap.widgets.TbThumbnails',
                          array(
                               'ajaxUpdate'         => false, // TODO: ajax update not compatible with EditableField
                               'dataProvider'       => $dataProvider,
                               'template'           => "{pager}\n{sorter}\n{items}\n{pager}\n{summary}",
                               'sortableAttributes' => array('title' => Yii::t('P3MediaModule.crud', 'Title'), 'id' => Yii::t('P3MediaModule.crud', 'ID')),
                               'pager'              => array(
                                   'class'               => 'TbPager',
                                   'displayFirstAndLast' => true,
                               ),
                               'itemView'           => '_thumb',
                               // Remove the existing tooltips and rebind the plugin after each ajax-call.
                          ));
            ?>

        </div>
    </div>
</div>