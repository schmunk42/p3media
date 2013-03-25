<?php
$this->breadcrumbs['P3 Medias'] = array('admin');
$this->breadcrumbs[$model->{$model->tableSchema->primaryKey}] = array('view','id'=>$model->{$model->tableSchema->primaryKey});
$this->breadcrumbs[] = Yii::t('app', 'Update');
?>

<?php $this->widget("TbBreadcrumbs", array("links" => $this->breadcrumbs)) ?>

<h1>
    Update P3 Media #<?php echo $model->id ?></h1>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>
<?php
$this->renderPartial('_form', array(
'model'=>$model));
?>
