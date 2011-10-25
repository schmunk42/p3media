<?php
$this->breadcrumbs = array(
	$this->module->id,
);
?>
<h1>Phundament 3 Media</h1>

<?php if (YII_DEBUG) { ?>
<div class="flash-notice">
	Note: If <b>YII_DEBUG</b> is set to <i>true</i>, access is not restricted.
</div>
<?php } ?>

<h2>Manage</h2>
<p>
<ul>
	<li>
		<?php echo CHtml::link('Manage media files', array('/p3media/p3Media/admin')); ?>
	</li>
</ul>

<h2>Import</h2>
<p>
<ul>
	<li><?php echo CHtml::link('Upload from browser', array('import/upload')); ?></li>
	<li><?php echo CHtml::link('Scan import directory', array('import/scan')); ?></li>
</ul>
</p>


</p>