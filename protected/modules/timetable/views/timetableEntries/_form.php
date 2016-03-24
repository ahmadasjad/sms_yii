<?php
/* @var $this TimetableEntriesController */
/* @var $model TimetableEntries */
/* @var $form CActiveForm */
?>

<div class="box-body">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'timetable-entries-form',
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
            echo $form->dropDownList($model, 'batch_id', CHtml::listData(Batches::model()->findAll("is_deleted=:is_deleted", array(':is_deleted'=>0)), "id", "name"), array(
                'empty' => 'Select Batch',
                'class' => 'form-control',
                'required' => 'required',
                'style' => 'width:378px;'
            ));
            ?>
            <?php echo $form->error($model, 'batch_id'); ?>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'weekday_id'); ?>
            <?php
            echo $form->dropDownList($model, 'weekday_id', CHtml::listData(Weekdays::model()->findAll(), "id", "weekday"), array(
                'empty' => 'Select WeekDay',
                'class' => 'form-control',
                'required' => 'required',
                'style' => 'width:378px;'
            ));
            ?>
            <?php echo $form->error($model, 'weekday_id'); ?>
        </div>
    </div>
    

    <div class="row">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'class_timing_id'); ?>
            <?php
            echo $form->dropDownList($model, 'class_timing_id', CHtml::listData(ClassTimings::model()->findAll(), "id", "name"), array(
                'empty' => 'Select Class Time',
                'class' => 'form-control',
                'required' => 'required',
                'style' => 'width:378px;'
            ));
            ?>
            <?php echo $form->error($model, 'class_timing_id'); ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'subject_id'); ?>
            <?php
            echo $form->dropDownList($model, 'subject_id', CHtml::listData(Subjects::model()->findAll(), "id", "name"), array(
                'empty' => 'Select Subject',
                'class' => 'form-control',
                'required' => 'required',
                'style' => 'width:378px;'
            ));
            ?>
            <?php echo $form->error($model, 'subject_id'); ?>
        </div>

    </div>
    <div class="row">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'employee_id'); ?>
            <?php
            echo $form->dropDownList($model, 'employee_id', CHtml::listData(Employees::model()->findAll(), "id", "first_name"), array(
                'empty' => 'Select Teacher',
                'class' => 'form-control',
                'required' => 'required',
                'style' => 'width:378px;'
            ));
            ?>
            <?php echo $form->error($model, 'employee_id'); ?>
        </div>

    </div>
    

    <div class="row buttons">
        <div class="form-group">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-sm')); ?>
        </div>

    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->