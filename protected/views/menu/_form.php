<?php
/* @var $this MenuController */
/* @var $model Menu */
/* @var $form CActiveForm */
?>

<div class="box-body">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'menu-form',
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
        <div class="col-sm-12 form-group">
            <?php echo $form->labelEx($model, 'parent_id'); ?>
            <select name="Menu[parent_id]" class="form-control">
                <option value="">Select Parent</option>
                <?php echo $menu_dropdown; ?>
            </select>
            
            <?php
                //echo $menu_dropdown;
                
//            echo $form->dropDownList($model, 'parent_id', $menu_dropdown, array(
//                'empty' => 'Select Parent',
//                'class' => 'form-control',
//                //'required' => 'required',
//                'style' => 'width:378px;'
//            ));
            ?>
            <?php //echo $form->textField($model, 'parent_id', array('size' => 11, 'maxlength' => 11,'class'=>'form-control')); ?>
            <?php echo $form->error($model, 'parent_id'); ?>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-12 form-group">

        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255,'class'=>'form-control')); ?>
        <?php echo $form->error($model, 'title'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 form-group">
            <?php echo $form->labelEx($model, 'url'); ?>
            <?php echo $form->textField($model, 'url', array('size' => 60, 'maxlength' => 255,'class'=>'form-control')); ?>
            <?php echo $form->error($model, 'url'); ?>

        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 form-group">
            <?php echo $form->labelEx($model, 'class'); ?>
            <?php echo $form->textField($model, 'class', array('size' => 60, 'maxlength' => 255,'class'=>'form-control')); ?>
            <?php echo $form->error($model, 'class'); ?>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-12 form-group">
            <?php echo $form->labelEx($model, 'position'); ?>
            <?php echo $form->textField($model, 'position',array('class'=>'form-control')); ?>
            <?php echo $form->error($model, 'position'); ?>

        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 form-group">

            <?php echo $form->labelEx($model, 'group_id'); ?>
            <?php echo $form->textField($model, 'group_id',array('class'=>'form-control')); ?>
            <?php echo $form->error($model, 'group_id'); ?>
        </div>
    </div>

    <div class="row buttons">
        <div class="col-sm-12 form-group">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary btn-sm')); ?>
        </div>
        
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->