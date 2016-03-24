<?php
$this->breadcrumbs = array(
    'Employees' => array('index'),
    $model->id,
);
?>
<?php
$this->breadcrumbs = array(
    'Employees' => array('index'),
    $model->id,
);
?>
<div class="row">
    <div class="col-md-3 col-sm-3">
        <?php $this->renderPartial('profileleft'); ?>
    </div>
    <div class="col-md-9 col-sm-9">
        <div class="box box-info ">
            <div class="box-header"><h3 class="box-title"><?php echo Yii::t('employees', 'Employee Profile : '); ?><?php echo $model->first_name . '&nbsp;' . $model->last_name; ?></h3></div>
            <div class="box-body nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li><?php echo CHtml::link(Yii::t('employees', 'Profile'), array('view', 'id' => $_REQUEST['id']), array('class' => 'active')); ?></li>
                    <li><?php echo CHtml::link(Yii::t('employees', 'Address'), array('address', 'id' => $_REQUEST['id'])); ?></li>
                    <li><?php echo CHtml::link(Yii::t('employees', 'Contact'), array('contact', 'id' => $_REQUEST['id'])); ?></li>
                    <li class="active"><?php echo CHtml::link(Yii::t('employees', 'Additional Info'), array('addinfo', 'id' => $_REQUEST['id'])); ?></li>
                </ul>
                <div class="tab-content">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo Yii::t('employees', 'Additional Info'); ?></h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <tr>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Marital Status'); ?></td>
                                        <td class="subhdng_nrmal"><?php echo $model->marital_status; ?></td>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Date of Birth'); ?></td>
                                        <td class="subhdng_nrmal"><?php
                                            $settings = UserSettings::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
                                            if ($settings != NULL) {
                                                $date1 = date($settings->displaydate, strtotime($model->date_of_birth));
                                                echo $date1;
                                            } else
                                                echo $model->date_of_birth;
                                            ?></td>
                                    </tr>

                                    <tr>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Children Count'); ?></td>
                                        <td class="subhdng_nrmal"><?php echo $model->children_count; ?></td>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Office Phone2'); ?></td>
                                        <td class="subhdng_nrmal"><?php echo $model->office_phone2; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Father Name'); ?></td>
                                        <td class="subhdng_nrmal"><?php echo $model->father_name; ?></td>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Mother Name'); ?></td>
                                        <td class="subhdng_nrmal"><?php echo $model->mother_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Blood Group'); ?></td>
                                        <td class="subhdng_nrmal"><?php echo $model->blood_group; ?></td>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Nationality'); ?></td>
                                        <td class="subhdng_nrmal"><?php
                                            $count = Countries::model()->findByAttributes(array('id' => $model->nationality_id));
                                            if (count($count) != 0)
                                                echo $count->name;
                                            ?></td>
                                    </tr>
                            </table>
                            <div class="ea_pdf" style="top:4px; right:6px;"><?php //echo CHtml::link('<img src="images/pdf-but.png">', array('Employees/pdf','id'=>$_REQUEST['id']));  ?></div>

                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>



