<?php
/* @var $this ClassHomeworkController */
/* @var $model ClassHomework */
/* @var $form CActiveForm */
?>

<div class="box-body">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'class-homework-form',
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
            <?php // echo $form->textField($model, 'batch_id', array('class' => 'form-control')); ?>
            <?php echo $form->dropDownList($model, "batch_id", CHtml::listData(Batches::model()->findAll(), 'id', 'name'), array('class' => 'form-control')) ?>
            <?php echo $form->error($model, 'batch_id'); ?>          
        </div>        
    </div>

    <div class="row">
        <?php //echo $form->labelEx($model, 'employee_id'); ?>        
        <?php echo $form->hiddenField($model, 'employee_id', array('value' => $_SESSION['profile']['id'])); ?>
        <?php //echo $form->textField($model, 'employee_id'); ?>
        <?php echo $form->error($model, 'employee_id'); ?>
    </div>

    <!--    <div class="row">
            <div class="form-group">      
    <?php echo $form->labelEx($model, 'subject_id'); ?>
    <?php echo $form->textField($model, 'subject_id', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'subject_id'); ?>      
            </div>
        </div>-->
    <div class="row">
        <div class="form-group">     
            <?php echo $form->labelEx($model, 'subject_id'); ?>
            <?php // echo $form->textField($model, 'subject_id'); ?>
            <?php echo $form->dropDownList($model, "subject_id", CHtml::listData(Subjects::model()->findAll(), 'id', 'name'), array('class' => 'form-control')) ?>
            <?php echo $form->error($model, 'subject_id'); ?>       
        </div>
    </div>

    <div class="row">
        <div class="form-group">   
            <?php echo $form->labelEx($model, 'homework_title'); ?>
            <?php echo $form->textField($model, 'homework_title', array('size' => 60, 'maxlength' => 254, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'homework_title'); ?>         
        </div>
    </div>

    <div class="row">
        <div class="form-group"> 
            <?php echo $form->labelEx($model, 'homework_description'); ?>
            <?php echo $form->textArea($model, 'homework_description', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'homework_description'); ?>           
        </div>
    </div>

    <div class="row buttons">
        <div class="form-group">    
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>        
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->