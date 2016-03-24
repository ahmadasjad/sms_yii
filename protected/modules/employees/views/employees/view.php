<?php
$this->breadcrumbs = array(
    'Employees' => array('index'),
    'View',
);
?>
<div class="row">
    <div class="col-md-3 col-sm-3">
        <?php $this->renderPartial('profileleft'); ?>
    </div>
    <div class="col-md-9 col-sm-9">
        <div class="box box-info ">
            <div class="box-header"><h3 class="box-title"><?php echo Yii::t('employees', 'Employee Profile :'); ?><?php echo $model->first_name . '&nbsp;' . $model->last_name; ?></h3></div>
            <div class="box-body nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><?php echo CHtml::link(Yii::t('employees', 'Profile'), array('view', 'id' => $_REQUEST['id']), array('class' => 'active')); ?></li>
                    <li><?php echo CHtml::link(Yii::t('employees', 'Address'), array('address', 'id' => $_REQUEST['id'])); ?></li>
                    <li><?php echo CHtml::link(Yii::t('employees', 'Contact'), array('contact', 'id' => $_REQUEST['id'])); ?></li>
                    <li><?php echo CHtml::link(Yii::t('employees', 'Additional Info'), array('addinfo', 'id' => $_REQUEST['id'])); ?></li>
                </ul>
                <div class="tab-content">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo Yii::t('employees', 'General'); ?></h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <tr>
                                    <th class="listbx_subhdng"><?php echo Yii::t('employees', 'Join Date'); ?></th>
                                    <td class="subhdng_nrmal"><?php
                                        $settings = UserSettings::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
                                        if ($settings != NULL) {
                                            $date1 = date($settings->displaydate, strtotime($model->joining_date));
                                            echo $date1;
                                        } else
                                            echo $model->joining_date;
                                        ?></td>
                                    <th class="listbx_subhdng"><?php echo Yii::t('employees', 'Department'); ?></th>
                                    <td class="subhdng_nrmal"><?php
                                        $dep = EmployeeDepartments::model()->findByAttributes(array('id' => $model->employee_department_id));
                                        if ($dep != NULL) {
                                            echo $dep->name;
                                        }
                                        ?></td>
                                </tr>

                                <tr>
                                    <th class="listbx_subhdng"><?php echo Yii::t('employees', 'Category'); ?></th>
                                    <td class="subhdng_nrmal"><?php
                                        $cat = EmployeeCategories::model()->findByAttributes(array('id' => $model->employee_category_id));
                                        if ($cat != NULL) {
                                            echo $cat->name;
                                        }
                                        ?></td>
                                    <th class="listbx_subhdng"><?php echo Yii::t('employees', 'Position'); ?></th>
                                    <td class="subhdng_nrmal"><?php
                                        $pos = EmployeePositions::model()->findByAttributes(array('id' => $model->employee_position_id));
                                        if ($pos != NULL) {
                                            echo $pos->name;
                                        }
                                        ?></td>
                                </tr>
                                <tr>
                                    <th class="listbx_subhdng"><?php echo Yii::t('employees', 'Grade'); ?> </th>
                                    <td class="subhdng_nrmal"><?php
                                        $grd = EmployeeGrades::model()->findByAttributes(array('id' => $model->employee_grade_id));
                                        if ($grd != NULL) {
                                            echo $grd->name;
                                        }
                                        ?></td>
                                    <th class="listbx_subhdng"><?php echo Yii::t('employees', 'Job Title'); ?></th>
                                    <td class="subhdng_nrmal"><?php echo $model->job_title; ?></td>
                                </tr>
                                <tr>

                                    <th class="listbx_subhdng"><?php echo Yii::t('employees', 'Gender'); ?></th>
                                    <td class="subhdng_nrmal"><?php
                                        if ($model->gender == 'M')
                                            echo 'Male';
                                        else
                                            echo 'Female';
                                        ?></td>

                                    <td class="listbx_subhdng"></td>
                                    <td class="subhdng_nrmal"></td>
                                </tr>
                                <tr>
                                    <th class="listbx_subhdng"><?php echo Yii::t('employees', 'Status'); ?></th>
                                    <td class="subhdng_nrmal"><?php echo $model->status; ?></td>
                                    <th class="listbx_subhdng"><?php echo Yii::t('employees', 'Qualification'); ?></th>
                                    <td class="subhdng_nrmal"><?php echo $model->qualification; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="listbx_subhdng"> <?php echo Yii::t('employees', 'Total Experience'); ?> </th>
                                    <td class="subhdng_nrmal"><?php echo $model->experience_year; ?></td>
                                    <th class="listbx_subhdng"><?php echo Yii::t('employees', 'Experience Info'); ?></th>
                                    <td class="subhdng_nrmal"><?php echo $model->experience_detail; ?></td>
                                </tr>
                            </table>
                            <!--<div class="ea_pdf" style="top:4px; right:6px;"><?php echo CHtml::link('<img src="images/pdf-but.png">', array('Employees/pdf', 'id' => $_REQUEST['id']), array('target' => '_blank')); ?></div>-->

                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
