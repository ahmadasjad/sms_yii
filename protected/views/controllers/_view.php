<?php
/* @var $this ControllersController */
/* @var $data Controllers */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('controller_nam')); ?>:</b>
	<?php echo CHtml::encode($data->controller_nam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('controller_url')); ?>:</b>
	<?php echo CHtml::encode($data->controller_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('module_id')); ?>:</b>
	<?php echo CHtml::encode($data->module_id); ?>
	<br />


</div>