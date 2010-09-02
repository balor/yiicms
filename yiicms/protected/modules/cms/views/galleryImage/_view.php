<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery_folder_id')); ?>:</b>
	<?php echo CHtml::encode($data->gallery_folder_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
	<?php echo CHtml::encode($data->author); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_dimensions')); ?>:</b>
	<?php echo CHtml::encode($data->image_dimensions); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_size')); ?>:</b>
	<?php echo CHtml::encode($data->image_size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_filename')); ?>:</b>
	<?php echo CHtml::encode($data->image_filename); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	*/ ?>

</div>