<?php
$this->breadcrumbs[] = 'Upload';

$this->widget('p3media.extensions.jquery-file-upload.EFileUpload');

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

<div id="file_upload">
    <form action="<?php echo $this->createUrl('import/uploadFile') ?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="file[]" multiple>
        <button type="submit">Upload</button>
        <div class="file_upload_label">Upload files</div>
    </form>
    <table class="files">
        <tr class="file_upload_template" style="display:none;">
            <td class="file_upload_preview"></td>
            <td class="file_name"></td>
            <td class="file_size"></td>
            <td class="file_upload_progress"><div></div></td>
            <td class="file_upload_start"><button>Start</button></td>
            <td class="file_upload_cancel"><button>Cancel</button></td>
        </tr>
        <tr class="file_download_template" style="display:none;">
            <td class="file_download_preview"></td>
            <td class="file_name"><a></a></td>
            <td class="file_size"></td>
            <td class="file_download_delete" colspan="3"><button>Delete</button></td>
        </tr>
    </table>
    <div class="file_upload_overall_progress"><div style="display:none;"></div></div>
    <div class="file_upload_buttons">
        <button class="file_upload_start">Start All</button> 
        <button class="file_upload_cancel">Cancel All</button> 
        <button class="file_download_delete">Delete All</button>
    </div>
</div>


<!--

<div id="fileupload">
        <div class="fileupload-buttonbar">

            <label class="fileinput-button">
                <span>Add files...</span>
                <input type="file" name="files[]" multiple>
            </label>
            <button type="submit" class="start">Start upload</button>
            <button type="reset" class="cancel">Cancel upload</button>
            <button type="button" class="delete">Delete files</button>
			<img>
        </div>
    <div class="fileupload-content">
        <table class="files"></table>
        <div class="fileupload-progressbar"></div>
    </div>
</div>

<script id="template-upload" type="text/x-jquery-tmpl">
    <tr class="template-upload{{if error}} ui-state-error{{/if}}">
        <td class="preview"></td>
        <td class="name">${name}</td>
        <td class="size">${sizef}</td>
        {{if error}}
            <td class="error" colspan="2">Error:
                {{if error === 'maxFileSize'}}File is too big
                {{else error === 'minFileSize'}}File is too small
                {{else error === 'acceptFileTypes'}}Filetype not allowed
                {{else error === 'maxNumberOfFiles'}}Max number of files exceeded
                {{else}}${error}
                {{/if}}
            </td>
        {{else}}
            <td class="progress"><div></div></td>
            <td class="start"><button>Start</button></td>
        {{/if}}
        <td class="cancel"><button>Cancel</button></td>
    </tr>
</script>

<script id="template-download" type="text/x-jquery-tmpl">
    <tr class="template-download{{if error}} ui-state-error{{/if}}">
        {{if error}}
            <td></td>
            <td class="name">${name}</td>
            <td class="size">${sizef}</td>
            <td class="error" colspan="2">Error:
                {{if error === 1}}File exceeds upload_max_filesize (php.ini directive)
                {{else error === 2}}File exceeds MAX_FILE_SIZE (HTML form directive)
                {{else error === 3}}File was only partially uploaded
                {{else error === 4}}No File was uploaded
                {{else error === 5}}Missing a temporary folder
                {{else error === 6}}Failed to write file to disk
                {{else error === 7}}File upload stopped by extension
                {{else error === 'maxFileSize'}}File is too big
                {{else error === 'minFileSize'}}File is too small
                {{else error === 'acceptFileTypes'}}Filetype not allowed
                {{else error === 'maxNumberOfFiles'}}Max number of files exceeded
                {{else error === 'uploadedBytes'}}Uploaded bytes exceed file size
                {{else error === 'emptyResult'}}Empty file upload result
                {{else}}${error}
                {{/if}}
            </td>
        {{else}}
            <td class="preview">
                {{if thumbnail_url}}
                    <a href="${url}" target="_blank"><img src="${thumbnail_url}"></a>
                {{/if}}
            </td>
            <td class="name">
                <a href="${url}"{{if thumbnail_url}} target="_blank"{{/if}}>${name}</a>
            </td>
            <td class="size">${sizef}</td>
            <td colspan="2"></td>
        {{/if}}
        <td class="delete">
            <button data-type="${delete_type}" data-url="${delete_url}">Delete</button>
        </td>
    </tr>
</script>
-->