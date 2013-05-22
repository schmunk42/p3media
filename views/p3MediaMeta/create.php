<?php
$this->breadcrumbs[Yii::t('P3MediaModule.crud', 'Metadata')] = array('admin');
$this->breadcrumbs[] = Yii::t('P3MediaModule.crud', 'Create');
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>

<h1>
    <?php echo Yii::t('P3MediaModule.crud', 'Media'); ?>
    <small><?php echo Yii::t('P3MediaModule.crud', 'Create Metadata'); ?></small>
</h1>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>
<?php
$this->renderPartial('_form', array(
'model' => $model,
'buttons' => 'create'));

?>

