<?php
$this->breadcrumbs[] = 'Upload';


if ($this->action->id !== 'uploadPopup') {
    $this->widget('TbBreadcrumbs',
                  array(
                       'links' => $this->breadcrumbs
                  ));
}
?>

<h1>
    Media <small>Upload Session</small>
</h1>

<div class="btn-toolbar">
    <?php
    $this->widget('bootstrap.widgets.TbButton',
                  array(
                       'label'       => 'Browse',
                       'icon'        => 'list',
                       'url'         => array(
                           '/p3media/default',
                           'returnUrl' => $this->createUrl("", $_GET)
                       ),
                       'htmlOptions' => array('class' => 'btn'))
    );
    ?>
</div>

<p>
<ul>
    <li>
        Add files by drag & drop or by clicking the select button below
    </li>
    <li>
        Click 'Start upload'
    </li>
    <li>
        When upload has been completed, manage your files with
        the <?php echo CHtml::link('File Browser', array('default/browser')) ?>
    </li>
</ul>
</p>
<?php
$this->widget('jquery-file-upload-widget.EFileUpload');
?>
