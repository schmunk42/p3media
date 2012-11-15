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


<h1>Media</h1>
<p>
<?php
    $this->widget('TbBreadcrumbs',
                  array(
                       'links' => $this->breadcrumbs
                  ));
    ?>
</p>

<h2>Upload</h2>
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
$this->widget('jquery-file-upload-widget.EFileUpload');
?>
