<?php
$this->breadcrumbs[] = 'Upload';
?>
<!DOCTYPE HTML>
<!--
/*
 * jQuery File Upload Plugin HTML Example 5.0.5
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://creativecommons.org/licenses/MIT/
 */
-->
<h1>Phundament 3 Media Upload</h1>
<p>
<ul>
	<li>
		Add files by drag & drop or by clicking the button below.
	</li>
	<li>
		Click 'Start upload'
	</li>
</ul>
</p>
<?php
$this->widget('ext.p3extensions.widgets.jquery-file-upload.EFileUpload');
?>
