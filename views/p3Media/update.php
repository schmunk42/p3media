<?php
if(!isset($this->breadcrumbs) || ($this->breadcrumbs === array()))

$this->breadcrumbs=array(
	'P3 Medias'=>array('index'),
	$model->path=>array('view','path'=>$model->path),
	Yii::t('app', 'Update'),
);

/*if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
	array('label'=>Yii::t('app', 'Manage') , 'url'=>array('admin')),
	array('label'=>Yii::t('app', 'Create') , 'url'=>array('create')),
	array('label'=>Yii::t('app', 'View') , 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app', 'List') , 'url'=>array('index')),
);*/
?>

<h1> <?php echo Yii::t('app', 'Update');?> <?php echo Yii::t('app', 'P3Media');?> #<?php echo $model->path; ?> </h1>
<?php
$this->renderPartial('_form', array(
			'model'=>$model));
?>
