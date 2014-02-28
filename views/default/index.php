<?php
$this->breadcrumbs = array(
    $this->module->id,
);
?>

<?php
$this->widget('TbBreadcrumbs',
              array(
                   'links' => $this->breadcrumbs
              )
);
?>

<h1><?php echo Yii::t('P3MediaModule.module', 'Media'); ?> <small><?php echo Yii::t('P3MediaModule.module', 'Overview'); ?></small></h1>


<h2><?php echo Yii::t('P3MediaModule.module', 'Manage'); ?></h2>
<p>
<ul>
    <li>
        <?php echo CHtml::link(Yii::t('P3MediaModule.module', 'Media Browser'), array('browser')); ?>
    </li>
    <li>
        <?php echo CHtml::link(Yii::t('P3MediaModule.module', 'CRUD'), array('/p3media/p3Media/admin')); ?>
    </li>
</ul>

<h2><?php echo Yii::t('P3MediaModule.module', 'Import'); ?></h2>
<p>
<ul>
    <li><?php echo CHtml::link(Yii::t('P3MediaModule.module', 'Upload from browser'), array('import/upload')); ?></li>
    <li><?php echo CHtml::link(Yii::t('P3MediaModule.module', 'Scan import directory'), array('import/scan')); ?></li>
</ul>
</p>

</p>
