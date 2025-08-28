<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min_points')); ?>:</b>
	<?php echo CHtml::encode($data->min_points); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discount_percentage')); ?>:</b>
	<?php echo CHtml::encode($data->discount_percentage); ?>
	<br />


</div>