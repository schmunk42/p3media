<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1>Phundament 3 Media</h1>

<h2>Import</h2>
<p>
<?php echo CHtml::link('Scan import directory', array('import/scan')); ?>
</p>

<h2>Manage</h2>
<p>
<?php echo CHtml::link('Manage media files', array('media/admin')); ?>
</p>