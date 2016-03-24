<div class="captionWrapper ">
    <ul class="nav nav-tabs">
        <li><a href="javascript:void(0);">Employee Details</a></li>
        <li class="active"><a href="javascript:void(0);">Employee Contact Details</a></li>
    </ul>
</div>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'employees-form',
    'enableAjaxValidation' => true,
        ));
?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<div class="formCon ">
    <div class="formConInner panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">Home Address</h3></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-2">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'home_address_line1')); ?>
                </div>
                <div class="col-sm-4"><?php echo $form->textField($model, 'home_address_line1', array('size' => 25, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'home_address_line1'); ?></div>
                <div class="col-sm-2"><?php echo $form->labelEx($model, Yii::t('employees', 'home_address_line2')); ?>
                </div>
                <div class="col-sm-4">
                    <?php echo $form->textField($model, 'home_address_line2', array('size' => 25, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'home_address_line2'); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'home_city')); ?>
                </div>
                <div class="col-sm-4"><?php echo $form->textField($model, 'home_city', array('size' => 25, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'home_city'); ?></div>
                <div class="col-sm-2">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'home_state')); ?>
                </div>
                <div class="col-sm-4"><?php echo $form->textField($model, 'home_state', array('size' => 25, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'home_state'); ?></div>
            </div>
            <div class="row">
                <div  class="col-sm-2"><?php echo $form->labelEx($model, Yii::t('employees', 'home_country_id')); ?>
                </div>
                <div class="col-sm-4"><?php echo $form->dropDownList($model, 'home_country_id', CHtml::listData(Countries::model()->findAll(), 'id', 'name'), array('empty' => 'Select Country')); ?>
                    <?php echo $form->error($model, 'home_country_id'); ?></div>
                <div class="col-sm-2"><?php echo $form->labelEx($model, Yii::t('employees', 'home_pin_code')); ?>
                </div>
                <div class="col-sm-4"><?php echo $form->textField($model, 'home_pin_code', array('size' => 25, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'home_pin_code'); ?></div>
            </div>
        </div>
    </div>
</div>

<div class="formCon ">
    <div class="formConInner panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">Office Address</h3></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-2">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'office_address_line1')); ?>
                </div>
                <div class="col-sm-4">
                    <?php echo $form->textField($model, 'office_address_line1', array('size' => 25, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'office_address_line1'); ?></div>
                <div class="col-sm-2"><?php echo $form->labelEx($model, Yii::t('employees', 'office_address_line2')); ?>
                </div>
                <div class="col-sm-4"><?php echo $form->textField($model, 'office_address_line2', array('size' => 25, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'office_address_line2'); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-2"><?php echo $form->labelEx($model, Yii::t('employees', 'office_city')); ?>
                </div>
                <div class="col-sm-4"><?php echo $form->textField($model, 'office_city', array('size' => 25, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'office_city'); ?></div>
                <div class="col-sm-2"><?php echo $form->labelEx($model, Yii::t('employees', 'office_state')); ?>
                </div>
                <div class="col-sm-4"><?php echo $form->textField($model, 'office_state', array('size' => 25, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'office_state'); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-2"><?php echo $form->labelEx($model, Yii::t('employees', 'office_country_id')); ?>
                </div>
                <div class="col-sm-4"><?php echo $form->dropDownList($model, 'office_country_id', CHtml::listData(Countries::model()->findAll(), 'id', 'name'), array('empty' => 'Select Country')); ?>
                    <?php echo $form->error($model, 'office_country_id'); ?></div>
                <div class="col-sm-2"><?php echo $form->labelEx($model, Yii::t('employees', 'office_pin_code')); ?>
                </div>
                <div class="col-sm-4"><?php echo $form->textField($model, 'office_pin_code', array('size' => 25, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'office_pin_code'); ?></div>
            </div>
        </div>
    </div>
</div>

<div class="formCon ">
    <div class="formConInner panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">Contact Details</h3></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-2"><?php echo $form->labelEx($model, Yii::t('employees', 'office_phone1')); ?>
                </div>
                <div class="col-sm-4"><?php echo $form->textField($model, 'office_phone1', array('size' => 30, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'office_phone1'); ?></div>
                <div class="col-sm-2"><?php echo $form->labelEx($model, Yii::t('employees', 'office_phone2')); ?>
                </div>
                <div class="col-sm-4"><?php echo $form->textField($model, 'office_phone2', array('size' => 30, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'office_phone2'); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-2"><?php echo $form->labelEx($model, Yii::t('employees', 'mobile_phone')); ?>
                </div>
                <div class="col-sm-4"><?php echo $form->textField($model, 'mobile_phone', array('size' => 30, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'mobile_phone'); ?></div>
                <div class="col-sm-2"><?php echo $form->labelEx($model, Yii::t('employees', 'home_phone')); ?>
                </div>
                <div class="col-sm-4"><?php echo $form->textField($model, 'home_phone', array('size' => 30, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'home_phone'); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-2"><?php echo $form->labelEx($model, Yii::t('employees', 'email')); ?>
                </div>
                <div class="col-sm-4"><?php echo $form->textField($model, 'email', array('size' => 30, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'email'); ?></div>
                <div class="col-sm-2"><?php echo $form->labelEx($model, Yii::t('employees', 'fax')); ?>
                </div>
                <div class="col-sm-4"><?php echo $form->textField($model, 'fax', array('size' => 30, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'fax'); ?></div>
            </div>
        </div>
    </div>
</div>


<div class="formCon">

    <div class="formConInner">

        <!-- Hidden Values -->
        <div class="row">
            <?php //echo $form->labelEx($model,'photo_content_type'); ?>
            <?php echo $form->hiddenField($model, 'photo_content_type', array('size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'photo_content_type'); ?>
        </div>

        <div class="row">
            <?php //echo $form->labelEx($model,'photo_data'); ?>
            <?php echo $form->hiddenField($model, 'photo_data'); ?>
            <?php echo $form->error($model, 'photo_data'); ?>
        </div>

        <div class="row">
            <?php //echo $form->labelEx($model,'created_at'); ?>
            <?php echo $form->hiddenField($model, 'created_at'); ?>
            <?php echo $form->error($model, 'created_at'); ?>
        </div>

        <div class="row">
            <?php //echo $form->labelEx($model,'updated_at'); ?>
            <?php echo $form->hiddenField($model, 'updated_at'); ?>
            <?php echo $form->error($model, 'updated_at'); ?>
        </div>

        <div class="row">
            <?php //echo $form->labelEx($model,'photo_file_size'); ?>
            <?php echo $form->hiddenField($model, 'photo_file_size'); ?>
            <?php echo $form->error($model, 'photo_file_size'); ?>
        </div>

        <div class="row">
            <?php //echo $form->labelEx($model,'user_id'); ?>
            <?php echo $form->hiddenField($model, 'user_id'); ?>
            <?php echo $form->error($model, 'user_id'); ?>
        </div>
    </div>
</div><!-- form -->
<!-- Hidden Values Ends -->
<div class="form-group">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Next Step »' : 'Save', array('class' => 'btn btn-primary btn-sm')); ?>
</div>

<?php $this->endWidget(); ?>
