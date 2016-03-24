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
                    <li class="active"><?php echo CHtml::link(Yii::t('employees', 'Address'), array('address', 'id' => $_REQUEST['id'])); ?></li>
                    <li><?php echo CHtml::link(Yii::t('employees', 'Contact'), array('contact', 'id' => $_REQUEST['id'])); ?></li>
                    <li><?php echo CHtml::link(Yii::t('employees', 'Additional Info'), array('addinfo', 'id' => $_REQUEST['id'])); ?></li>
                </ul>
                <div class="tab-content">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo Yii::t('employees', 'Address'); ?></h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                    <tr>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Home Address Line 1'); ?></td>
                                        <td class="subhdng_nrmal"><?php echo $model->home_address_line1; ?></td>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Office Address Line 1'); ?></td>
                                        <td class="subhdng_nrmal"><?php echo $model->office_address_line1; ?></td>
                                    </tr>

                                    <tr>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Home Address Line 2'); ?></td>
                                        <td class="subhdng_nrmal"><?php echo $model->home_address_line2; ?></td>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Office Address Line 2'); ?></td>
                                        <td class="subhdng_nrmal"><?php echo $model->office_address_line2; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Home City'); ?> </td>
                                        <td class="subhdng_nrmal"><?php echo $model->home_city; ?></td>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Office City'); ?> </td>
                                        <td class="subhdng_nrmal"><?php echo $model->office_city; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Home state'); ?></td>
                                        <td class="subhdng_nrmal"><?php echo $model->home_state; ?></td>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Office state'); ?></td>
                                        <td class="subhdng_nrmal"><?php echo $model->office_state; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Home Country'); ?></td>
                                        <td class="subhdng_nrmal"><?php
                                            $count = Countries::model()->findByAttributes(array('id' => $model->home_country_id));
                                            if (count($count) != 0)
                                                echo $count->name;
                                            ?></td>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Office Country'); ?></td>
                                        <td class="subhdng_nrmal"><?php
                                            $count_1 = Countries::model()->findByAttributes(array('id' => $model->office_country_id));
                                            if (count($count_1) != 0)
                                                echo $count_1->name;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Home PIN'); ?></td>
                                        <td class="subhdng_nrmal"><?php echo $model->home_pin_code; ?></td>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Office PIN'); ?></td>
                                        <td class="subhdng_nrmal"><?php echo $model->office_pin_code; ?></td>
                                    </tr>
                                </table>
                                <div class="ea_pdf" style="top:4px; right:6px;"><?php //echo CHtml::link('<img src="images/pdf-but.png">', array('Employees/pdf','id'=>$_REQUEST['id']));   ?></div>

                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>