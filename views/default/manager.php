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

<h2>Manager</h2>

    <style type="text/css">
        .files li.span3 {
            height: 180px;
        }
    </style>

<div class="row">
    <div class="span3">
        <div class="directories">
            <ul>
                <li class="root-dir"><a href="?treeParent_id=">Root</a></li>
            </ul>
        </div>
    </div>
    <div class="span9">
        <div class="files">
            <?php
            $this->widget('bootstrap.widgets.TbThumbnails',
                          array(
                               'dataProvider' => $model->search(),
                               'template' => "{pager}{sorter}\n{items}\n{pager}{summary}",
                               'sortableAttributes' => array('title' => 'Title', 'id' => 'ID'),
                               'pager' => array(
                                   'class' => 'TbPager',
                                   'displayFirstAndLast' => true,
                               ),
                               'itemView' => '_thumb',
                               // Remove the existing tooltips and rebind the plugin after each ajax-call.

                          ));
            ?>

        </div>
    </div>
</div>