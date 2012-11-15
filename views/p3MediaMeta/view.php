<?php
$this->breadcrumbs['P3 Media Metas'] = array('index');
$this->breadcrumbs[] = $model->id;
?>
<h1>
    View P3 Media Meta #<?php echo $model->id ?></h1>


<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>

<h2>
    Data
</h2>

<p>
    <?php
    $this->widget('TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
            array(
            'name'=>'id',
            'value'=>($model->id0 !== null)?'<span class=label>CBelongsToRelation</span><br/>'.CHtml::link($model->id0->title, array('p3Media/view','id'=>$model->id0->id), array('class'=>'btn')):'n/a',
            'type'=>'html',
        ),
        'status',
        'type',
        'language',
        array(
            'name'=>'treeParent_id',
            'value'=>($model->treeParent !== null)?'<span class=label>CBelongsToRelation</span><br/>'.CHtml::link($model->treeParent->status, array('p3MediaMeta/view','id'=>$model->treeParent->id), array('class'=>'btn')):'n/a',
            'type'=>'html',
        ),
        'treePosition',
        'begin',
        'end',
        'keywords',
        'customData',
        'label',
        'owner',
        'checkAccessCreate',
        'checkAccessRead',
        'checkAccessUpdate',
        'checkAccessDelete',
        'createdAt',
        'createdBy',
        'modifiedAt',
        'modifiedBy',
        'guid',
        'ancestor_guid',
        'model',
),
        )); ?></p>


<h2>
    Relations
</h2>

<div class='row'>
</div>
<div class='row'>
</div>
<div class='row'>
<div class='span3'><?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>'p3MediaMetas', 'icon'=>'icon-list-alt', 'url'=> array('p3MediaMeta/admin')),
                array('icon'=>'icon-plus', 'url'=>array('p3MediaMeta/create', 'P3MediaMeta' => array('treeParent_id'=>$model->{$model->tableSchema->primaryKey}))),
        ),
    )); ?></div><div class='span8'>
<?php
    echo '<span class=label>CHasManyRelation</span>';
    if (is_array($model->p3MediaMetas)) {

        echo CHtml::openTag('ul');
            foreach($model->p3MediaMetas as $relatedModel) {

                echo '<li>';
                echo CHtml::link($relatedModel->status, array('p3MediaMeta/view','id'=>$relatedModel->id), array('class'=>''));

                echo '</li>';
            }
        echo CHtml::closeTag('ul');
    }
?></div>
</div>
