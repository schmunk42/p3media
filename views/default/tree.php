
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

<h2>Tree</h2>
<?php
$this->widget('ext.phundament.p3extensions.widgets.p3MetaTree.P3MetaTreeWidget', array(
    'model' => "P3MediaMeta",
    'view' => 'p3media.views.widgets.p3MetaTree.mediaTree',
    'routes' => array(
        'updateContent' => '/p3media/p3Media/update',
        'updateMetaData' => '/p3media/p3MediaMeta/update',
        'viewContent' => '/p3media/p3Media/view',
        'viewMetaData' => '/p3media/p3MediaMeta/view'
    )
));
?>


</p>