<?php
$this->breadcrumbs = array(
	$this->module->id => array("/".$this->module->id),
	'Ckeditor Test'
);
?>
<h1>Phundament 3 Media</h1>

<h2>Ckeditor Test</h2>
<p>
    <?php $this->widget('ext.p3extensions.widgets.ckeditor.CKEditor', array('name'=>'test','options'=>array(
    'filebrowserWindowWidth' => '990',
			'filebrowserWindowHeight' => '900',
    'filebrowserBrowseCreateUrl'		=> array('/p3media/ckeditor'),
			'filebrowserImageBrowseCreateUrl'	=> array('/p3media/ckeditor/image'),
			'filebrowserFlashBrowseCreateUrl'	=> array('/p3media/ckeditor/flash'),
			
			'filebrowserUploadCreateUrl' => array('/p3media/import/upload'), ))) ?>
</p>