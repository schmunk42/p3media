<?php
$this->breadcrumbs['P3 Media Metas'] = array('admin');
$this->breadcrumbs[] = Yii::t('app', 'Create');
?>
<h1>
    Create P3 Media Meta</h1>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>
<?php
$this->renderPartial('_form', array(
'model' => $model,
'buttons' => 'create'));

?>

