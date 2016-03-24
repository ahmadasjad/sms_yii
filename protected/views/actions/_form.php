<?php
/* @var $this ActionsController */
/* @var $model Actions */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'actions-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'action_name'); ?>
		<?php echo $form->textField($model,'action_name',array('size'=>60,'maxlength'=>254)); ?>
		<?php echo $form->error($model,'action_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'action_url'); ?>
		<?php echo $form->textField($model,'action_url',array('size'=>60,'maxlength'=>254)); ?>
		<?php echo $form->error($model,'action_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'controller_id'); ?>
		<?php echo $form->textField($model,'controller_id'); ?>
		<?php echo $form->error($model,'controller_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->