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

<h1><?php echo Yii::t('P3MediaModule.crud', 'Media'); ?> <small><?php echo Yii::t('P3MediaModule.crud', 'Overview'); ?></small></h1>


<h2><?php echo Yii::t('P3MediaModule.crud', 'Manage'); ?></h2>
<p>
<ul>
    <li>
        <?php echo CHtml::link(Yii::t('P3MediaModule.crud', 'Media Browser'), array('browser')); ?>
    </li>
    <li>
        <?php echo CHtml::link(Yii::t('P3MediaModule.crud', 'CRUD'), array('/p3media/p3Media/admin')); ?>
    </li>
</ul>

<h2><?php echo Yii::t('P3MediaModule.crud', 'Import'); ?></h2>
<p>
<ul>
    <li><?php echo CHtml::link(Yii::t('P3MediaModule.crud', 'Upload from browser'), array('import/upload')); ?></li>
    <li><?php echo CHtml::link(Yii::t('P3MediaModule.crud', 'Scan import directory'), array('import/scan')); ?></li>
</ul>
</p>

</p>
