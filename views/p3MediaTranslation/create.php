<?php
$this->setPageTitle(
    Yii::t('p3MediaModule.model', 'P3 Media Translation')
    . ' - '
    . Yii::t('P3MediaModule.crud', 'Create')
);

$this->breadcrumbs[Yii::t('p3MediaModule.model', 'P3 Media Translations')] = array('admin');
$this->breadcrumbs[] = Yii::t('P3MediaModule.crud', 'Create');
?>
<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>
    <h1>
        <?php echo Yii::t('p3MediaModule.model', 'P3 Media Translation'); ?>
        <small><?php echo Yii::t('P3MediaModule.crud', 'Create'); ?></small>

    </h1>

<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>
<?php $this->renderPartial('_form', array('model' => $model, 'buttons' => 'create')); ?>
<?php $this->renderPartial("_toolbar", array("model" => $model)); ?>