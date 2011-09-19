<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('language')); ?>:</b>
	<?php echo CHtml::encode($data->language); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('treeParent_id')); ?>:</b>
	<?php echo CHtml::encode($data->treeParent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('treePosition')); ?>:</b>
	<?php echo CHtml::encode($data->treePosition); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('begin')); ?>:</b>
	<?php echo CHtml::encode($data->begin); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('end')); ?>:</b>
	<?php echo CHtml::encode($data->end); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keywords')); ?>:</b>
	<?php echo CHtml::encode($data->keywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customData')); ?>:</b>
	<?php echo CHtml::encode($data->customData); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('label')); ?>:</b>
	<?php echo CHtml::encode($data->label); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('owner')); ?>:</b>
	<?php echo CHtml::encode($data->owner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('checkAccessCreate')); ?>:</b>
	<?php echo CHtml::encode($data->checkAccessCreate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('checkAccessRead')); ?>:</b>
	<?php echo CHtml::encode($data->checkAccessRead); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('checkAccessUpdate')); ?>:</b>
	<?php echo CHtml::encode($data->checkAccessUpdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('checkAccessDelete')); ?>:</b>
	<?php echo CHtml::encode($data->checkAccessDelete); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdAt')); ?>:</b>
	<?php echo CHtml::encode($data->createdAt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdBy')); ?>:</b>
	<?php echo CHtml::encode($data->createdBy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modifiedAt')); ?>:</b>
	<?php echo CHtml::encode($data->modifiedAt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modifiedBy')); ?>:</b>
	<?php echo CHtml::encode($data->modifiedBy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('guid')); ?>:</b>
	<?php echo CHtml::encode($data->guid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ancestor_guid')); ?>:</b>
	<?php echo CHtml::encode($data->ancestor_guid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('model')); ?>:</b>
	<?php echo CHtml::encode($data->model); ?>
	<br />

	*/ ?>

</div>
