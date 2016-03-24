<?php
/* @var $this ActionsController */
/* @var $data Actions */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('action_name')); ?>:</b>
	<?php echo CHtml::encode($data->action_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('action_url')); ?>:</b>
	<?php echo CHtml::encode($data->action_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('controller_id')); ?>:</b>
	<?php echo CHtml::encode($data->controller_id); ?>
	<br />


</div>