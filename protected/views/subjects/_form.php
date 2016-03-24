<?php
/* @var $this SubjectsController */
/* @var $model Subjects */
/* @var $form CActiveForm */
?>

<div class="box-body">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'subjects-form',
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
            <?php echo $form->labelEx($model, 'name'); ?>
            <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255,'class'=>'form-control')); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>

    </div>

    <div class="row">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'code'); ?>
            <?php echo $form->textField($model, 'code', array('size' => 60, 'maxlength' => 255,'class'=>'form-control')); ?>
            <?php echo $form->error($model, 'code'); ?>
        </div>

    </div>
    <div class="row">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'batch_id'); ?>
            <?php
            echo $form->dropDownList($model, 'batch_id', CHtml::listData(Courses::model()->findAll(), "id", "course_name"), array(
                'empty' => 'Select Course',
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
            <?php echo $form->labelEx($model, 'no_exams'); ?>
            <?php echo $form->checkBox($model, 'no_exams',array('class'=>'form-control')); ?>
            <?php echo $form->error($model, 'no_exams'); ?>            
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'max_weekly_classes'); ?>
            <?php echo $form->textField($model, 'max_weekly_classes',array('class'=>'form-control')); ?>
            <?php echo $form->error($model, 'max_weekly_classes'); ?>
        </div>        
    </div>

<!--    <div class="row">
        <div class="form-group">
            <?php //echo $form->labelEx($model, 'elective_group_id'); ?>
            <?php //echo $form->textField($model, 'elective_group_id',array('class'=>'form-control')); ?>
            <?php //echo $form->error($model, 'elective_group_id'); ?>            
        </div>
    </div>-->

    <!--    <div class="row">
    <?php //echo $form->labelEx($model, 'is_deleted'); ?>
    <?php //echo $form->textField($model, 'is_deleted'); ?>
    <?php //echo $form->error($model, 'is_deleted'); ?>
        </div>-->

    <!--    <div class="row">
    <?php //echo $form->labelEx($model, 'created_at'); ?>
    <?php //echo $form->textField($model, 'created_at'); ?>
    <?php //echo $form->error($model, 'created_at'); ?>
        </div>-->

    <!--    <div class="row">
    <?php //echo $form->labelEx($model, 'updated_at'); ?>
    <?php //echo $form->textField($model, 'updated_at'); ?>
    <?php //echo $form->error($model, 'updated_at'); ?>
        </div>-->

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->