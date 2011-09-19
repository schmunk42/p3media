<?php
if(!isset($this->breadcrumbs) || ($this->breadcrumbs === array()))

$this->breadcrumbs=array(
	'P3 Media Metas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('app', 'Update'),
);

if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . Yii::t('app','P3MediaMeta'), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . Yii::t('app','P3MediaMeta'), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'View') . ' ' . Yii::t('app','P3MediaMeta'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app', 'Manage') . ' ' . Yii::t('app','P3MediaMeta'), 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app', 'Update');?> <?php echo Yii::t('app', 'P3MediaMeta');?> #<?php echo $model->id; ?> </h1>
<?php
$this->renderPartial('_form', array(
			'model'=>$model));
?>
