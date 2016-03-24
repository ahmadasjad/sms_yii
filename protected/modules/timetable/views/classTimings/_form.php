<?php
/* @var $this ClassTimingsController */
/* @var $model ClassTimings */
/* @var $form CActiveForm */
?>

<div class="box-body">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'class-timings-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'batch_id'); ?>
            <?php
            echo $form->dropDownList($model, 'batch_id', CHtml::listData(Batches::model()->findAll(), "id", "name"), array(
                'empty' => 'Select Batch',
                'class' => 'form-control',
                'required' => 'required',
                'style' => 'width:378px;'
            ));
            //echo $form->textField($model, 'batch_id');
            ?>
            <?php echo $form->error($model, 'batch_id'); ?>
        </div>

    </div>

    <div class="row">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'name'); ?>
            <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>

    </div>

    <div class="row">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'start_time'); ?>
            <?php echo $form->textField($model, 'start_time', array('size' => 60, 'maxlength' => 120, 'class' => 'form-control timepicker')); ?>
            <?php echo $form->error($model, 'start_time'); ?>
        </div>

    </div>

    <div class="row">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'end_time'); ?>
            <?php echo $form->textField($model, 'end_time', array('size' => 60, 'maxlength' => 120, 'class' => 'form-control timepicker')); ?>
            <?php echo $form->error($model, 'end_time'); ?>
        </div>

    </div>
    <script>
        $(document).ready(function () {
            $('.timepicker').timepicker();
        });
    </script>
    <div class="row">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'is_break'); ?>
            <?php echo $form->checkBox($model, 'is_break'); ?>
            <?php echo $form->error($model, 'is_break'); ?>
        </div>

    </div>

    <div class="row buttons">
        <div class="form-group">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-sm')); ?>
        </div>

    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->