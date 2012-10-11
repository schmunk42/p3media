<?php
$this->breadcrumbs = array(
    $this->module->id,
);
?>
<h1>Media</h1>
<?php
$this->widget('zii.widgets.CBreadcrumbs',
              array(
                   'links' => $this->breadcrumbs

              ));
?>
<h2>Manage</h2>
<p>
<ul>
    <li>
        <?php echo CHtml::link('Media manager', array('manager')); ?>
    </li>
    <li>
        <?php echo CHtml::link('CRUD', array('/p3media/p3Media/admin')); ?>
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
