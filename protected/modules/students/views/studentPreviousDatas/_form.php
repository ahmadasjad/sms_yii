
<ul class="nav nav-tabs">
    <li><a href="javascript:void(0);">Student Details</a></li>
    <li><a href="javascript:void(0);">Parent Details</a></li>
    <li><a href="javascript:void(0);">Emergency Contact</a></li>
    <li class="active"><a href="javascript:void(0);">Previous Details</a></li>
    <li class="last"><a href="javascript:void(0);">Student Profile</a></li>
</ul>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'student-previous-datas-form',
    'enableAjaxValidation' => false,
        ));
?>
<div class="row">
    <div class="col-sm-12">
        <?php if ($form->errorSummary($model)) {
            ?>
            <div class="errorSummary">Input Error<br />
                <span>Please fix the following error(s).</span>
            </div>
        <?php } ?>
    </div>
</div>
<p class="note">Fields with <span class="required">*</span> are required.</p>
<div class="row">
    <div class="col-sm-6 form-group">
        <?php echo $form->labelEx($model, Yii::t('students', 'institution')); ?>
        <?php echo $form->textField($model, 'institution', array('size' => 25, 'maxlength' => 255,'class'=>'form-control')); ?>
        <?php echo $form->error($model, 'institution'); ?>
    </div>
    <div class="col-sm-6 form-group">
        <?php echo $form->labelEx($model, Yii::t('students', 'year')); ?>
        <?php echo $form->dropDownList($model, 'year', $model->getYears(), array('prompt' => 'select','class'=>'form-control')); ?>
        <?php echo $form->error($model, 'year'); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <?php echo $form->labelEx($model, Yii::t('students', 'course')); ?>
        <?php echo $form->textField($model, 'course', array('size' => 25, 'maxlength' => 255,'class'=>'form-control')); ?>
        <?php echo $form->error($model, 'course'); ?>
    </div>
    <div class="col-sm-6 form-group">
        <?php echo $form->labelEx($model, Yii::t('students', 'total_mark')); ?>
        <?php echo $form->textField($model, 'total_mark', array('size' => 25, 'maxlength' => 255,'class'=>'form-control')); ?>
        <?php echo $form->error($model, 'total_mark'); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <?php //echo $form->labelEx($model,'student_id');  ?>
        <?php echo $form->hiddenField($model, 'student_id', array('value' => $_REQUEST['id'])); ?>
        <?php echo $form->error($model, 'student_id'); ?>

        <?php //echo $form->labelEx($model,'student_id');  ?>
        <?php echo $form->hiddenField($model, 'student_id', array('value' => $_REQUEST['id'])); ?>
        <?php echo $form->error($model, 'student_id'); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <?php //echo CHtml::link('Save And Add Another', array('students/create'),array('class'=>'formbut','style'=>'padding:8px 20px')); ?>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'SAVE' : 'Save', array('class' => 'btn btn-primary')); ?>
        <?php
        if (Yii::app()->controller->action->id == 'update') {
            echo '&nbsp;&nbsp;' . CHtml::button('Remove', array('submit' => array('StudentPreviousDatas/delete', 'id' => $_REQUEST['pid'], 'sid' => $_REQUEST['id']), 'class' => 'btn btn-primary', 'confirm' => 'Are you sure?'));
        }
        ?>
    </div>
</div>
<?php $this->endWidget(); ?>
