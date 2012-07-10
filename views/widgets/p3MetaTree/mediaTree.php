<p class="">
    <?php echo CHtml::link('<i class="icon-file"></i>', array($this->routes['updateContent'], 'id' => $model->id), array('class' => 'btn btn-mini')); ?>
    <?php echo CHtml::link('<i class="icon-list"></i>', array($this->routes['updateMetaData'], 'id' => $model->id), array('class' => 'btn btn-mini')); ?>
    &nbsp;<?php echo CHtml::link('#' . $model->id, array($this->routes['viewContent'], 'id' => $model->id)) ?>
    <?php echo ' ' . $model->id0->_label ?>
    <br/>
    <?php echo $model->id0->image('p3media-ckbrowse') ?>
</p>
