<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs=array(
	'Media Metas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('app', 'Update'),
);

if(!isset($this->menu))
$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' MediaMeta', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' MediaMeta', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'View') . ' MediaMeta', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app', 'Manage') . ' MediaMeta', 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app', 'Update');?> MediaMeta #<?php echo $model->id; ?> </h1>
<?php
$this->renderPartial('_form', array(
			'model'=>$model));
?>
