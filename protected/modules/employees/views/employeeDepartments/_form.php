

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'employee-departments-form',
    'enableAjaxValidation' => false,
        ));
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>
<div class="formCon">

    <div class="formConInner">
        <?php echo $form->errorSummary($model); ?>
        <div class="form-group">
            <?php echo $form->labelEx($model, Yii::t('employees', 'code')); ?>
            <?php echo $form->textField($model, 'code', array('size' => 30, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'code'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'name'); ?>
            <?php echo $form->textField($model, Yii::t('employees', 'name'), array('size' => 30, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>
        <div class="form-group">
            <?php //echo $form->labelEx($model,'status');     ?>
            <?php echo $form->hiddenField($model, 'status', array('value' => 1, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'status'); ?>
        </div>
        <div class="form-group">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'formbut btn btn-primary btn-sm')); ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div><!-- form -->