<?php
$this->breadcrumbs = array(
    $this->module->id => array("/" . $this->module->id),
    'Browser'
);
?>

<?php
$this->widget('TbBreadcrumbs',
              array(
                   'links' => $this->breadcrumbs
              ));
?>


<h1>
    Media
    <small>Browser</small>
</h1>

<div class="btn-toolbar">
    <?php
    $this->widget('bootstrap.widgets.TbButton',
                  array(
                       'label'       => 'Manage',
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
                       'label'       => 'Upload Files',
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
                       'label'       => 'Create File',
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
                       'label'       => 'Create Folder',
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
                                       'label' => 'Root',
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

            <?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>

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
                               'sortableAttributes' => array('title' => 'Title', 'id' => 'ID'),
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