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
<h1>PadSync</h1>
<h2>Settings</h2>
<ul>
	<li>only PDFs</li>
	<li>max. 10MB per file</li>
	<li>12 files total</li>
</ul>
<h2>How To</h2>
<ol>
	<li>Click on "Upload files" and select files or drag files there</li>
	<li>Press [Start all]</li>
	<li>Press [Update now" on your iPad]</li>
</ol>
<?php
$this->widget('p3media.extensions.jquery-file-upload.EFileUpload');
?>
