<?php
if (Yii::app()->controller->action->id == 'create') {
    $config = Configurations::model()->findByPk(7);
    $adm_no = '';
    $adm_no_1 = '';
    if ($config->config_value == 1) {
        $adm_no = Students::model()->findAll(array('order' => 'id DESC', 'limit' => 1));
        $adm_no_1 = $adm_no[0]['id'] + 1;
    }
    ?>
    <div class="captionWrapper ">
        <ul class="nav nav-tabs">
            <li class="active"><a href="javascript:void(0);">Student Details</a></li>
            <li><a href="javascript:void(0);">Parent Details</a></li>
            <li><a href="javascript:void(0);">Emergency Contact</a></li>
            <li><a href="javascript:void(0);">Previous Details</a></li>
            <li class="last"><a href="javascript:void(0);">Student Profile</a></li>
        </ul>
    </div>
    <?php
} else {

    $adm_no = Students::model()->findByAttributes(array('id' => $_REQUEST['id']));
    $adm_no_1 = $adm_no->admission_no;
}
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'students-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>

<?php
if ($form->errorSummary($model)) {
    ?>
    <div class="errorSummary">Input Error<br />
        <span>Please fix the following error(s).</span>
    </div>
    <?php
}
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>
<div class="formCon" style="background:url(images/yellow-pattern.png); width:100%; border:0px #fac94a solid; color:#000; ">
    <div class="row">
        <div class="col-sm-5 col-sm-offset-1 form-group">
            <?php echo $form->labelEx($model, Yii::t('students', 'admission_no')); ?>
            <?php
            echo $form->textField($model, 'admission_no', array('size' => 20, 'maxlength' => 255, 'value' => $adm_no_1, 'disabled' => true,'class'=>'form-control'));
            echo $form->hiddenField($model, 'admission_no', array('value' => $adm_no_1));
            ?>
            <?php echo $form->error($model, 'admission_no'); ?>
        </div>
        <div class="col-sm-5 form-group">
            <?php echo $form->labelEx($model, Yii::t('students', 'admission_date')); ?>
            <?php
            //echo $form->textField($model,'admission_date');
            $settings = UserSettings::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
            if ($settings != NULL) {
                $date = $settings->dateformat;
            } else
                $date = 'dd-mm-yy';
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                //'name'=>'Students[admission_date]',
                'model' => $model,
                'attribute' => 'admission_date',
                // additional javascript options for the date picker plugin
                'options' => array(
                    'showAnim' => 'fold',
                    'dateFormat' => $date,
                    'changeMonth' => true,
                    'changeYear' => true,
                    'yearRange' => '1900:'
                ),
                'htmlOptions' => array(
                    'style' => '',
                    'class' => 'form-control'
                ),
            ));
            ?>
            <?php echo $form->error($model, 'admission_date'); ?>
        </div>
    </div>
</div>
<div class="formCon ">
    <div class="formConInner panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">Personal Details</h3></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('students', 'first_name')); ?>
                    <?php echo $form->textField($model, 'first_name', array('size' => 30, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'first_name'); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('students', 'middle_name')); ?>
                    <?php echo $form->textField($model, 'middle_name', array('size' => 10, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'middle_name'); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('students', 'last_name')); ?>
                    <?php echo $form->textField($model, 'last_name', array('size' => 25, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'last_name'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('students', 'batch_id')); ?>
                    <?php
                    $models = Batches::model()->findAll("is_deleted=:x", array(':x' => '0'));
                    $data = array();
                    foreach ($models as $model_1) {
                        //$posts=Batches::model()->findByPk($model_1->id);
                        $data[$model_1->id] = $model_1->course123->course_name . '-' . $model_1->name;
                    }
                    ?>
                    <?php
                    if (isset($_REQUEST['bid']) and $_REQUEST['bid'] != NULL) {
                        echo $form->dropDownList($model, 'batch_id', $data, array('options' => array($_REQUEST['bid'] => array('selected' => true)),
                            'style' => '', 'empty' => 'Select Batch',
                            'class' => 'form-control'
                        ));
                    } else {
                        echo $form->dropDownList($model, 'batch_id', $data, array(
                            'style' => '', 'empty' => 'Select Batch',
                            'class' => 'form-control'
                        ));
                    }
                    ?>
                    <?php echo $form->error($model, 'batch_id'); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('students', 'date_of_birth')); ?>
                    <?php
                    //echo $form->textField($model,'date_of_birth');
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        //'name'=>'Students[date_of_birth]',
                        'attribute' => 'date_of_birth',
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
                            //'style' => 'width:92px;',
                            'class' => 'form-control'
                        ),
                    ));
                    ?>
                    <?php echo $form->error($model, 'date_of_birth'); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('students', 'gender')); ?>
                    <?php //echo $form->textField($model,'gender',array('size'=>60,'maxlength'=>255)); ?>
                    <?php echo $form->dropDownList($model, 'gender', array('M' => 'Male', 'F' => 'Female'), array('empty' => 'Select Gender', 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'gender'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('students', 'blood_group')); ?>
                    <?php //echo $form->textField($model,'blood_group',array('size'=>60,'maxlength'=>255));  ?>
                    <?php
                    echo $form->dropDownList($model, 'blood_group', array('A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'O+' => 'O+', 'O-' => 'O-', 'AB+' => 'AB+', 'AB-' => 'AB-'), array('empty' => 'Unknown', 'class' => 'form-control'));
                    ?>
                    <?php echo $form->error($model, 'blood_group'); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('students', 'birth_place')); ?>
                    <?php echo $form->textField($model, 'birth_place', array('size' => 10, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'birth_place'); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('students', 'nationality_id')); ?>
                    <?php //echo $form->textField($model,'nationality_id'); ?>
                    <?php
                    echo $form->dropDownList($model, 'nationality_id', CHtml::listData(Countries::model()->findAll(), 'id', 'name'), array(
                        'style' => '', 'empty' => 'Select Nationality', 'class' => 'form-control'
                    ));
                    ?>
                    <?php echo $form->error($model, 'nationality_id'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('students', 'language')); ?>
                    <?php echo $form->textField($model, 'language', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'language'); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('students', 'religion')); ?>
                    <?php echo $form->textField($model, 'religion', array('size' => 10, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'religion'); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('students', 'student_category_id')); ?>
                    <?php //echo $form->textField($model,'student_category_id');  ?>
                    <?php echo $form->dropDownList($model, 'student_category_id', CHtml::listData(StudentCategories::model()->findAll(), 'id', 'name'), array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'student_category_id'); ?>
                </div>
            </div>
        </div>        
    </div>
    <div class="formConInner panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">Contact Details</h3></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('students', 'address_line1')); ?>
                    <?php echo $form->textField($model, 'address_line1', array('size' => 25, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'address_line1'); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('students', 'address_line2')); ?>
                    <?php echo $form->textField($model, 'address_line2', array('size' => 25, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'address_line2'); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('students', 'city')); ?>
                    <?php echo $form->textField($model, 'city', array('size' => 25, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'city'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('students', 'state')); ?>
                    <?php echo $form->textField($model, 'state', array('size' => 25, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'state'); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('students', 'pin_code')); ?>
                    <?php echo $form->textField($model, 'pin_code', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'pin_code'); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('students', 'country_id')); ?>
                    <?php //echo $form->textField($model,'country_id');  ?>
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
                    <?php echo $form->labelEx($model, Yii::t('students', 'phone1')); ?>
                    <?php echo $form->textField($model, 'phone1', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'phone1'); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('students', 'phone2')); ?>
                    <?php echo $form->textField($model, 'phone2', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'phone2'); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('students', 'email')); ?>
                    <?php echo $form->textField($model, 'email', array('size' => 25, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'email'); ?>
                </div>
            </div>
        </div>        
    </div>
    <div class="formCon form-group" style=" background:#EDF1D1 url(images/green-bg.png); border:0px #c4da9b solid; color:#393; "
         <div class="formConInner" style="padding:10px 10px;">
            <!--<h3>Image Details</h3>-->
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <?php /* ?><tr>
                  <td><?php echo $form->labelEx($model,'photo_file_name'); ?></td>
                  <td><?php echo $form->hiddenField($model,'photo_file_name',array('size'=>30,'maxlength'=>255)); ?>
                  <?php echo $form->error($model,'photo_file_name'); ?></td>
                  <td><?php echo $form->labelEx($model,'photo_content_type'); ?>
                  </td>
                  <td><?php echo $form->hiddenField($model,'photo_content_type',array('size'=>30,'maxlength'=>255)); ?>
                  <?php echo $form->error($model,'photo_content_type'); ?></td>
                  </tr><?php */ ?>
                <tr>
                    <td style="padding: 10px;">
                        <?php
                        if ($model->photo_data == NULL)
                            echo $form->labelEx($model, Yii::t('students', '<strong style="color:#000">Upload Photo</strong>'));
                        else
                            echo $form->labelEx($model, 'Photo');
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($model->isNewRecord) {
                            echo $form->fileField($model, 'photo_data');
                            echo $form->error($model, 'photo_data');
                        } else {
                            if ($model->photo_data == NULL) {
                                echo $form->fileField($model, 'photo_data');
                                echo $form->error($model, 'photo_data');
                            } else {
                                if (Yii::app()->controller->action->id == 'update') {
                                    echo CHtml::link(Yii::t('students', 'Remove'), array('Students/remove', 'id' => $model->id), array('confirm' => 'Are you sure?'));
                                    echo '<img class="imgbrder" src="' . $this->createUrl('Students/DisplaySavedImage&id=' . $model->primaryKey) . '" alt="' . $model->photo_file_name . '" width="100" height="100" />';
                                } else if (Yii::app()->controller->action->id == 'create') {
                                    echo CHtml::hiddenField('photo_file_name', $model->photo_file_name);
                                    echo CHtml::hiddenField('photo_content_type', $model->photo_content_type);
                                    echo CHtml::hiddenField('photo_file_size', $model->photo_file_size);
                                    echo CHtml::hiddenField('photo_data', bin2hex($model->photo_data));
                                    echo '<img class="imgbrder" src="' . $this->createUrl('Students/DisplaySavedImage&id=' . $model->primaryKey) . '" alt="' . $model->photo_file_name . '" width="100" height="100" />';
                                }
                            }
                        }
                        ?>
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>

            <div class="row">
                <?php //echo $form->labelEx($model,'class_roll_no'); ?>
                <?php echo $form->hiddenField($model, 'class_roll_no', array('size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'class_roll_no'); ?>
            </div>

            <div class="row">
                <?php //echo $form->labelEx($model,'immediate_contact_id');  ?>
                <?php echo $form->hiddenField($model, 'immediate_contact_id'); ?>
                <?php echo $form->error($model, 'immediate_contact_id'); ?>
            </div>

            <div class="row">
                <?php //echo $form->labelEx($model,'is_sms_enabled'); ?>
                <?php echo $form->hiddenField($model, 'is_sms_enabled'); ?>
                <?php echo $form->error($model, 'is_sms_enabled'); ?>
            </div>


            <div class="row">
                <?php //echo $form->labelEx($model,'status_description');  ?>
                <?php echo $form->hiddenField($model, 'status_description', array('size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'status_description'); ?>
            </div>

            <div class="row">
                <?php //echo $form->labelEx($model,'is_active');  ?>
                <?php echo $form->hiddenField($model, 'is_active'); ?>
                <?php echo $form->error($model, 'is_active'); ?>
            </div>

            <div class="row">
                <?php //echo $form->labelEx($model,'is_deleted'); ?>
                <?php echo $form->hiddenField($model, 'is_deleted'); ?>
                <?php echo $form->error($model, 'is_deleted'); ?>
            </div>

            <div class="row">
                <?php //echo $form->labelEx($model,'created_at'); ?>
                <?php
                if (Yii::app()->controller->action->id == 'create') {
                    echo $form->hiddenField($model, 'created_at', array('value' => date('Y-m-d')));
                } else {
                    echo $form->hiddenField($model, 'created_at');
                }
                ?>
                <?php echo $form->error($model, 'created_at'); ?>
            </div>

            <div class="row">
                <?php //echo $form->labelEx($model,'updated_at'); ?>
                <?php echo $form->hiddenField($model, 'updated_at', array('value' => date('Y-m-d'))); ?>
                <?php echo $form->error($model, 'updated_at'); ?>
            </div>

            <div class="row">
                <?php //echo $form->labelEx($model,'has_paid_fees'); ?>
                <?php echo $form->hiddenField($model, 'has_paid_fees'); ?>
                <?php echo $form->error($model, 'has_paid_fees'); ?>
            </div>

            <div class="row">
                <?php //echo $form->labelEx($model,'photo_file_size'); ?>
                <?php echo $form->hiddenField($model, 'photo_file_size'); ?>
                <?php echo $form->error($model, 'photo_file_size'); ?>
            </div>

            <div class="row">
                <?php //echo $form->labelEx($model,'user_id'); ?>
                <?php echo $form->hiddenField($model, 'user_id', array('value' => '1')); ?>
                <?php echo $form->error($model, 'user_id'); ?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="row">
        <div class="col-sm-4">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Parent Details »' : 'Save', array('class' => 'btn btn-primary')); ?>
        </div>    
    </div>
</div>




<?php $this->endWidget(); ?>