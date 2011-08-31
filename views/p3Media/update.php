<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs=array(
	'P3 Medias'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	Yii::t('app', 'Update'),
);

if(!isset($this->menu))
$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' P3Media', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' P3Media', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'View') . ' P3Media', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app', 'Manage') . ' P3Media', 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app', 'Update');?> P3Media #<?php echo $model->id; ?> </h1>
<?php
$this->renderPartial('_form', array(
			'model'=>$model));
?>
