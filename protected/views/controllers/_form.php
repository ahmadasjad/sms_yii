<?php
/* @var $this ControllersController */
/* @var $model Controllers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'controllers-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'controller_nam'); ?>
		<?php echo $form->textField($model,'controller_nam',array('size'=>60,'maxlength'=>254)); ?>
		<?php echo $form->error($model,'controller_nam'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'controller_url'); ?>
		<?php echo $form->textField($model,'controller_url',array('size'=>60,'maxlength'=>254)); ?>
		<?php echo $form->error($model,'controller_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'module_id'); ?>
		<?php echo $form->textField($model,'module_id'); ?>
		<?php echo $form->error($model,'module_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->