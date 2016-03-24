
<div class="captionWrapper ">
    <ul class="nav nav-tabs">
        <li class="active"><a href="javascript:void(0);">Employee Details</a></li>
        <li><a href="javascript:void(0);">Employee Contact Details</a></li>
    </ul>
</div>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'employees-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>

<?php
if ($form->errorSummary($model)) {
    ;
    ?>
    <div class="errorSummary">Input Error<br />
        <span>Please fix the following error(s).</span>
    </div>  <?php }
?>

<br/>
<p class="note">Fields with <span class="required">*</span> are required.</p>


<div class="formCon" style="background:#fcf1d4; width:100%; border:0px #fac94a solid; color:#000;background:url(images/yellow-pattern.png); width:100%; border:0p ">

    <div class="formConInner" style="padding:5px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <?php
                    $emp_id_1 = '';
                    if (Yii::app()->controller->action->id == 'create') {
                        $emp_id = Employees::model()->findAll(array('order' => 'id DESC', 'limit' => 1));
                        if (count($emp_id) > 0) {
                            $emp_id_1 = 'E' . ($emp_id[0]['id'] + 1);
                        } else {
                            $emp_id_1 = 'E' . (0 + 1);
                        }
                    } else {
                        $emp_id = Employees::model()->findByAttributes(array('id' => $_REQUEST['id']));
                        $emp_id_1 = $emp_id->employee_number;
                    }
                    ?>
                    <?php echo $form->labelEx($model, Yii::t('employees', 'employee_number')); ?></td>
                <td><?php echo $form->textField($model, 'employee_number', array('size' => 20, 'maxlength' => 255, 'value' => $emp_id_1)); ?>
                    <?php echo $form->error($model, 'employee_number'); ?></td>

                <td><?php echo $form->labelEx($model, Yii::t('employees', 'joining_date')); ?></td>
                <td><?php
                    $settings = UserSettings::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
                    if ($settings != NULL) {
                        $date = $settings->dateformat;
                    } else
                        $date = 'dd-mm-yy';
                    //echo $form->textField($model,'joining_date',array('size'=>30,'maxlength'=>255));
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        //'name'=>'Employees[joining_date]',
                        'attribute' => 'joining_date',
                        'model' => $model,
                        // additional javascript options for the date picker plugin
                        'options' => array(
                            'showAnim' => 'fold',
                            'dateFormat' => $date,
                            'changeMonth' => true,
                            'changeYear' => true,
                            'yearRange' => '1970:'
                        ),
                        'htmlOptions' => array(
                        //'style'=>'height:20px;'
                        //'value' => date('m-d-y'),
                        ),
                    ))
                    ?>
                    <?php echo $form->error($model, 'joining_date'); ?></td>

            </tr>
        </table>
    </div>
</div>


<div class="formCon ">
    <div class="formConInner panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">General Details</h3></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'first_name')); ?>
                    <?php echo $form->textField($model, 'first_name', array('size' => 32, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'first_name'); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'middle_name')); ?>
                    <?php echo $form->textField($model, 'middle_name', array('size' => 10, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'middle_name'); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'last_name')); ?>
                    <?php echo $form->textField($model, 'last_name', array('size' => 30, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'last_name'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'gender')); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php //echo $form->textField($model,'gender',array('size'=>30,'maxlength'=>255));                 ?>
                    <?php echo $form->dropDownList($model, 'gender', array('M' => 'Male', 'F' => 'Female'), array('empty' => 'Select Gender', 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'gender'); ?>
                </div>
                <div class="col-sm-2 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'date_of_birth')); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php
                    //echo $form->textField($model,'date_of_birth',array('size'=>30,'maxlength'=>255));
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        //'name'=>'Employees[date_of_birth]',
                        'attribute' => 'date_of_birth',
                        'model' => $model,
                        // additional javascript options for the date picker plugin
                        'options' => array(
                            'showAnim' => 'fold',
                            'dateFormat' => $date,
                            'changeMonth' => true,
                            'changeYear' => true,
                            'yearRange' => '1950:2050'
                        ),
                        'htmlOptions' => array(
                            'style' => '',
                            'class' => 'form-control'
                        ),
                    ))
                    ?>
                    <?php echo $form->error($model, 'date_of_birth'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'employee_department_id')); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->dropDownList($model, 'employee_department_id', CHtml::listData(EmployeeDepartments::model()->findAll(), 'id', 'name'), array('empty' => 'Select Department', 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'employee_department_id'); ?>
                </div>
                <div class="col-sm-2 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'employee_position_id')); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php
                    $criteria2 = new CDbCriteria;
                    $criteria2->compare('status', 1);
                    ?>
                    <?php echo $form->dropDownList($model, 'employee_position_id', CHtml::listData(EmployeePositions::model()->findAll($criteria2), 'id', 'name'), array('empty' => 'Select Position', 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'employee_position_id'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'employee_category_id')); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php
                    $criteria1 = new CDbCriteria;
                    $criteria1->compare('status', 1);
                    ?>
                    <?php echo $form->dropDownList($model, 'employee_category_id', CHtml::listData(EmployeeCategories::model()->findAll($criteria1), 'id', 'name'), array('empty' => 'Select Category', 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'employee_category_id'); ?>
                </div>
                <div class="col-sm-2 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'employee_grade_id')); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php
                    $criteria = new CDbCriteria;
                    $criteria->compare('status', 1);
                    ?>
                    <?php echo $form->dropDownList($model, 'employee_grade_id', CHtml::listData(EmployeeGrades::model()->findAll($criteria), 'id', 'name'), array('empty' => 'Select Grade', 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'employee_grade_id'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'job_title')); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->textField($model, 'job_title', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'job_title'); ?>
                </div>
                <div class="col-sm-2 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'qualification')); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->textField($model, 'qualification', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'qualification'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'status')); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->textField($model, 'status', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'status'); ?>
                </div>
                <div class="col-sm-2 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'total_experience'), array('style' => 'float:left')); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <?php
                            echo $form->dropDownList($model, 'experience_year', array('0' => 0, '1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5
                                , '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10, '11' => 11
                                , '12' => 12, '13' => 13, '14' => 14, '15' => 15, '16' => 16, '17' => 17
                                , '18' => 18, '19' => 19, '20' => 20), array('id' => 'experience_year', 'onchange' => 'star()', 'empty' => 'Years', 'class' => 'form-control'));
                            ?>
                            <?php echo $form->error($model, 'experience_year'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        </div>
                        <div class="col-sm-6">
                            <?php
                            echo $form->dropDownList($model, 'experience_month', array('0' => 0, '1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5,
                                '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10, '11' => 11,), array('id' => 'experience_month', 'onchange' => 'star2()', 'empty' => 'Months', 'class' => 'form-control'));
                            ?>
                            <?php echo $form->error($model, 'experience_month'); ?>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'experience_detail'), array('style' => 'float:left;')); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <?php echo $form->textArea($model, 'experience_detail', array('rows' => 6, 'cols' => 48, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'experience_detail'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="formCon ">
    <div class="formConInner panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title"><?php echo Yii::t('employees', 'Personal Details'); ?></h3></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-2 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'marital_status')); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->dropDownList($model, 'marital_status', array('Single' => 'Single', 'Married' => 'Married', 'Divorced' => 'Divorced'), array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'marital_status'); ?>
                </div>
                <div class="col-sm-2 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'children_count')); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->textField($model, 'children_count', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'children_count'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'father_name')); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->textField($model, 'father_name', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'father_name'); ?>
                </div>
                <div class="col-sm-2 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'mother_name')); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->textField($model, 'mother_name', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'mother_name'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'husband_name')); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->textField($model, 'husband_name', array('size' => 15, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'husband_name'); ?>
                </div>
                <div class="col-sm-2 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'nationality_id')); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php
                    echo $form->dropDownList($model, 'nationality_id', CHtml::listData(Countries::model()->findAll(), 'id', 'name'), array(
                        'style' => '',
                        'class' => 'form-control',
                        'empty' => 'Select Nationality'
                    ));
                    ?>
                    <?php echo $form->error($model, 'nationality_id'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 form-group">
                    <?php echo $form->labelEx($model, Yii::t('employees', 'blood_group')); ?>
                </div>
                <div class="col-sm-4 form-group">
                    <?php echo $form->dropDownList($model, 'blood_group', array('A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'O+' => 'O+', 'O-' => 'O-', 'AB+-' => 'AB+', 'AB-' => 'AB-'), array('empty' => 'Unknown', 'class' => 'form-control'));
                    ?>
                    <?php echo $form->error($model, 'blood_group'); ?>
                </div>
                <div class="col-sm-2 form-group">
                </div>
                <div class="col-sm-4 form-group">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="formCon ">
    <div class="formConInner panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">Profile Photo</h3></div>
        <div class="panel-body">
            <div class="row form-group">
                <div class="col-sm-4">
                    <?php
                    if ($model->photo_data == NULL) {
                        echo $form->labelEx($model, 'upload_photo');
                    } else {
                        echo $form->labelEx($model, 'Photo');
                    }
                    ?>
                </div>
                <div class="col-sm-4">
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
                                echo CHtml::link(Yii::t('students', 'Remove'), array('Employees/remove', 'id' => $model->id), array('confirm' => 'Are you sure?'));
                                echo '<img class="imgbrder" src="' . $this->createUrl('Employees/DisplaySavedImage&id=' . $model->primaryKey) . '" alt="' . $model->photo_file_name . '" width="100" height="100" />';
                            } else if (Yii::app()->controller->action->id == 'create') {
                                echo CHtml::hiddenField('photo_file_name', $model->photo_file_name);
                                echo CHtml::hiddenField('photo_content_type', $model->photo_content_type);
                                echo CHtml::hiddenField('photo_file_size', $model->photo_file_size);
                                echo CHtml::hiddenField('photo_data', bin2hex($model->photo_data));
                                echo '<img class="imgbrder" src="' . $this->createUrl('Employees/DisplaySavedImage&id=' . $model->primaryKey) . '" alt="' . $model->photo_file_name . '" width="100" height="100" />';
                            }
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <?php //echo $form->labelEx($model,'photo_file_size');   ?>
                <?php echo $form->hiddenField($model, 'photo_file_size'); ?>
                <?php echo $form->error($model, 'photo_file_size'); ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 form-group pull-right">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Next Step »' : 'Save', array('class' => 'btn btn-primary btn-sm')); ?>
    </div>
</div>


<?php $this->endWidget(); ?>
<script type="text/javascript">
    function star() {
        var year = '';
        var year_val = '';
        year = document.getElementById('experience_year');
        year_val = year.options[year.selectedIndex].value;
        if (year_val != '' && year_val != 0) {
            //alert(year_val);
            document.getElementById('required').style.visibility = 'visible';
        }
    }
    function star2() {
        var mnth = '';
        var mnth_val = '';
        mnth = document.getElementById('experience_month');
        mnth_val = mnth.options[mnth.selectedIndex].value;
        if (mnth_val != '' && mnth_val != 0) {
            //alert(year_val);
            document.getElementById('required').style.visibility = 'visible';
        }
    }
</script>