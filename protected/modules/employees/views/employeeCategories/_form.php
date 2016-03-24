<p class="note">Fields with <span class="required">*</span> are required.</p>
<div class="formCon">

    <div class="formConInner">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'employee-categories-form',
            'enableAjaxValidation' => false,
        ));
        ?>



        <?php /* ?><?php echo $form->errorSummary($model); ?><?php */ ?>
        <div class="form-group">
            <?php echo $form->labelEx($model, Yii::t('employees', 'name')); ?>
            <?php echo $form->textField($model, 'name', array('size' => 30, 'maxlength' => 255,'class'=>'form-control')); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, Yii::t('employees', 'prefix')); ?>
            <?php echo $form->textField($model, 'prefix', array('size' => 30, 'maxlength' => 255,'class'=>'form-control')); ?>
            <?php echo $form->error($model, 'prefix'); ?>
        </div>
        
        <div class="row">
            <?php //echo $form->labelEx($model,'status'); ?>
            <?php echo $form->hiddenField($model, 'status', array('value' => 1)); ?>
            <?php echo $form->error($model, 'status'); ?>
        </div>

        <div style="padding-top:20px;">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'formbut btn btn-primary')); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div><!-- form -->