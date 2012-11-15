<?php
$this->breadcrumbs['P3 Medias'] = array('admin');
$this->breadcrumbs[] = $model->id;
?>
<h1>
    View P3 Media #<?php echo $model->id ?></h1>


<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>

<h2>
    Image
</h2>

    <p>
        <?php echo $model->image('p3media-ckbrowse')."<br/>" . CHtml::link('Download', $this->createUrl('/p3media/file/', array('id' => $model->id))) . "<br/>"; ?>
    </p>

<h2>
    Data
</h2>


<p>
    <?php
    $this->widget('TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
            'id',
        'title',
        'description',
        'type',
        'path',
        'md5',
        'originalName',
        'mimeType',
        'size',
        'info',
),
        )); ?></p>


<h2>
    Relations
</h2>

<div class='row'>
<div class='span3'><?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>'metaData', 'icon'=>'icon-list-alt', 'url'=> array('p3MediaMeta/admin')),
                array('icon'=>'icon-plus', 'url'=>array('p3MediaMeta/create', 'P3MediaMeta' => array('id'=>$model->{$model->tableSchema->primaryKey}))),
        ),
    )); ?></div><div class='span8'>
<?php
    echo '<span class=label>CHasOneRelation</span>';
    $relatedModel = $model->metaData; 

    if ($relatedModel !== null) {
        echo CHtml::openTag('ul');
        echo '<li>';
        echo CHtml::link(
            '#'.$model->metaData->id.' '.$model->metaData->status,
            array('p3MediaMeta/view','id'=>$model->metaData->id),
            array('class'=>''));

        echo '</li>';

        echo CHtml::closeTag('ul');
    }
?></div></div>
