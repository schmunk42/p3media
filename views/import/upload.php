<?php
$this->breadcrumbs[] = Yii::t('P3MediaModule.module', 'Upload');


if ($this->action->id !== 'uploadPopup') {
    $this->widget('TbBreadcrumbs',
                  array(
                       'links' => $this->breadcrumbs
                  ));
}
?>

<h1>
    <?php echo Yii::t('P3MediaModule.module', 'Media'); ?> <small><?php echo Yii::t('P3MediaModule.module', 'Upload Session'); ?></small>
</h1>

<div class="btn-toolbar">
    <?php
    $this->widget('bootstrap.widgets.TbButton',
                  array(
                       'label'       => Yii::t('P3MediaModule.module', 'Browse'),
                       'icon'        => 'list',
                       'url'         => array(
                           '/p3media/default',
                           'returnUrl' => $this->createUrl("", $_GET)
                       ),
                       'htmlOptions' => array('class' => 'btn'))
    );
    ?>
</div>

<p>
<ul>
    <li>
    	<?php echo Yii::t('P3MediaModule.module', 'Add files by drag & drop or by clicking the select button below'); ?>
    </li>
    <li>
    	<?php echo Yii::t('P3MediaModule.module', 'Click Start upload'); ?>
    </li>
    <li>
    	<?php echo Yii::t('P3MediaModule.module', 'When upload has been completed, manage your files with'); ?>
        <?php echo CHtml::link(Yii::t('P3MediaModule.module', 'File Browser'), array('default/browser')) ?>
    </li>
</ul>
</p>

<style type="text/css">
    #fileupload form {
        margin-bottom: 0;
    }
</style>

<?php
$this->widget('jquery-file-upload-widget.EFileUpload');
?>
