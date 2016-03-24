<?php if (!Yii::app()->controller->action->id == 'update') { ?>


<?php } ?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'guardians-form',
    'enableAjaxValidation' => false,
        )
);
?>

<?php
if ($form->errorSummary($model)) {
    ?>
    <div class="errorSummary">Input Error<br />
        <span>Please fix the following error(s).</span>
    </div>
<?php } ?>
<?php
Yii::app()->clientScript->registerScript(
        'myHideEffect', '$(".flash").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
);
?>
<p class="note">Fields with <span class="required">*</span> are required.
    <?php if (Yii::app()->user->hasFlash('errorMessage')): ?>
        <span class="flash" style="background:#FFF; padding-left:100px; color:#C00;font-size:14px">
            <?php echo Yii::app()->user->getFlash('errorMessage'); ?>
        </span>
    <?php endif;
    ?>	
</p>


<div class="panel panel-primary">
    <div class="panel-heading"><h3 class="panel-title"><?php echo Yii::t('students', 'Parent - Personal Details'); ?></h3></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-4 form-group">
                <?php echo $form->labelEx($model, Yii::t('students', 'first_name')); ?>
                <?php echo $form->textField($model, 'first_name', array('size' => 25, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'first_name'); ?>
            </div>
            <div class="col-sm-4 form-group">
                <?php echo $form->labelEx($model, Yii::t('students', 'last_name')); ?>
                <?php echo $form->textField($model, 'last_name', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'last_name'); ?>
            </div>
            <div class="col-sm-4 form-group">
                <?php echo $form->labelEx($model, Yii::t('students', 'relation')); ?>
                <?php echo $form->textField($model, 'relation', array('size' => 25, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'relation'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 form-group">
                <?php echo $form->labelEx($model, Yii::t('students', 'Date of Birth')); ?>
                <?php
                //echo $form->textField($model,'dob');
                $settings = UserSettings::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
                if ($settings != NULL) {
                    $date = $settings->dateformat;
                } else
                    $date = 'dd-mm-yy';
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name' => 'dob',
                    'model' => $model,
                    // additional javascript options for the date picker plugin
                    'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => $date,
                        'changeMonth' => true,
                        'changeYear' => true,
                        'yearRange' => '1900:'
                    ),
                    'htmlOptions' => array(
                        'style' => '', 'class' => 'form-control'
                    ),
                ));
                ?>
                <?php echo $form->error($model, 'dob'); ?>
            </div>
            <div class="col-sm-4 form-group">
                <?php echo $form->labelEx($model, Yii::t('students', 'education')); ?>
                <?php echo $form->textField($model, 'education', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'education'); ?>
            </div>
            <div class="col-sm-4 form-group">
                <?php echo $form->labelEx($model, Yii::t('students', 'occupation')); ?>
                <?php echo $form->textField($model, 'occupation', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'occupation'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 form-group">
                <?php echo $form->labelEx($model, Yii::t('students', 'income')); ?>
                <?php echo $form->textField($model, 'income', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'income'); ?>
            </div>
            <div class="col-sm-4 form-group">

            </div>
            <div class="col-sm-4 form-group">

            </div>
        </div>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading"><h3 class="panel-title">Parent - Contact Details</h3></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-4 form-group">
                <?php echo $form->labelEx($model, Yii::t('students', 'email')); ?>
                <?php echo $form->textField($model, 'email', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'email'); ?>
            </div>
            <div class="col-sm-4 form-group">
                <?php echo $form->labelEx($model, Yii::t('students', 'office_phone1')); ?>
                <?php echo $form->textField($model, 'office_phone1', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'office_phone1'); ?>
            </div>
            <div class="col-sm-4 form-group">
                <?php echo $form->labelEx($model, Yii::t('students', 'office_phone2')); ?>
                <?php echo $form->textField($model, 'office_phone2', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'office_phone2'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 form-group">
                <?php echo $form->labelEx($model, Yii::t('students', 'mobile_phone')); ?>
                <?php echo $form->textField($model, 'mobile_phone', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'mobile_phone'); ?>
            </div>
            <div class="col-sm-4 form-group">
                <?php echo $form->labelEx($model, Yii::t('students', 'office_address_line1')); ?>
                <?php echo $form->textField($model, 'office_address_line1', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'office_address_line1'); ?>
            </div>
            <div class="col-sm-4 form-group">
                <?php echo $form->labelEx($model, Yii::t('students', 'office_address_line2')); ?>
                <?php echo $form->textField($model, 'office_address_line2', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'office_address_line2'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 form-group">
                <?php echo $form->labelEx($model, Yii::t('students', 'city')); ?>
                <?php echo $form->textField($model, 'city', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'city'); ?>
            </div>
            <div class="col-sm-4 form-group">
                <?php echo $form->labelEx($model, Yii::t('students', 'state')); ?>
                <?php echo $form->textField($model, 'state', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'state'); ?>
            </div>
            <div class="col-sm-4 form-group">
                <?php echo $form->labelEx($model, Yii::t('students', 'country_id')); ?>
                <?php
                echo $form->dropDownList($model, 'country_id', CHtml::listData(Countries::model()->findAll(), 'id', 'name'), array(
                    'style' => '', 'empty' => 'Select Country', 'class' => 'form-control'
                ));
                ?>
                <?php echo $form->error($model, 'country_id'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 form-group">
                <?php
                if ($model->isNewRecord) {
                    if ($check_flag == 1) {
                        ?>
                        <span style="float:left;"><?php echo $form->checkBox($model, 'user_create', array('id' => 'user_create', 'checked' => 'true')); ?></span>
                        <?php
                    } else {
                        ?>
                        <span style="float:left;"><?php echo $form->checkBox($model, 'user_create', array('id' => 'user_create')); ?></span>
                        <?php
                    }
                    ?>
                    <?php echo $form->labelEx($model, Yii::t('students', '&nbsp;Don\'t create parent user')); ?>
                    <?php
                    echo $form->error($model, 'user_create');
                }
                ?>
            </div>
            <div class="col-sm-4 form-group">

            </div>
            <div class="col-sm-4 form-group">

            </div>
        </div>
    </div>
</div>

<div class="row">
    <?php //echo $form->labelEx($model,'ward_id');  ?>
    <?php
    if (Yii::app()->controller->action->id == 'create') {
        ?>
        <?php echo $form->hiddenField($model, 'ward_id', array('value' => $_REQUEST['id'])); ?>
        <?php
    } else {
        echo $form->hiddenField($model, 'ward_id', array('value' => $_REQUEST['std']));
    }
    ?>
    <?php echo $form->error($model, 'ward_id'); ?>
</div>
<div class="row">
    <?php //echo $form->labelEx($model,'created_at');  ?>
    <?php
    if (Yii::app()->controller->action->id == 'create') {
        echo $form->hiddenField($model, 'created_at', array('value' => date('d-m-Y')));
    } else {
        echo $form->hiddenField($model, 'created_at');
    }
    ?>
    <?php echo $form->error($model, 'created_at'); ?>
</div>
<div class="row">
    <?php //echo $form->labelEx($model,'updated_at'); ?>
    <?php echo $form->hiddenField($model, 'updated_at', array('value' => date('d-m-Y'))); ?>
    <?php echo $form->error($model, 'updated_at'); ?>
</div>
<div class="row">
    <?php
    if (!empty($guardian_id)) {
        $display_existing = 'display:block;';
        $display_new = 'display:none;';
    } else {
        $display_existing = 'display:none;';
        $display_new = 'display:block;';
    }
    ?>
    <div class="col-sm-12">
        <div id="new_guardian" style="padding:0px 0 0 0px; text-align:left; <?php echo $display_new; ?>">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Emergency Contact »' : 'Save', array('class' => 'btn btn-primary')); ?>
        </div>
        <div id="existing_guardian" style="padding:0px 0 0 0px; text-align:left; <?php echo $display_existing; ?>">
            <?php echo CHtml::submitButton('Emergency Contact »', array('submit' => CController::createUrl('/students/guardians/update', array('id' => @$guardian_id, 'sid' => $_REQUEST['id'])), 'class' => 'btn btn-primary')); ?>
        </div>
    </div>

</div>

<?php $this->endWidget(); ?>