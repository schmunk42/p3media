<?php
$this->breadcrumbs = array(
    $this->module->id => array("/".$this->module->id),
    'Manager'
);
?>
<h1>Media</h1>
<?php
$this->widget('zii.widgets.CBreadcrumbs',
              array(
                   'links' => $this->breadcrumbs
              ));
?>
<h2>Filemanager</h2>

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
                                       'url' => array(""),
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
            $this->widget('bootstrap.widgets.TbThumbnails',
                          array(
                               'dataProvider' => $files->search(),
                               'template' => "{pager}\n{sorter}\n{items}\n{pager}\n{summary}",
                               'sortableAttributes' => array('title' => 'Title', 'id' => 'ID'),
                               'pager' => array(
                                   'class' => 'TbPager',
                                   'displayFirstAndLast' => true,
                               ),
                               'itemView' => '_thumb',
                               // Remove the existing tooltips and rebind the plugin after each ajax-call.
                          ));
            ?>

        </div>
    </div>
</div>