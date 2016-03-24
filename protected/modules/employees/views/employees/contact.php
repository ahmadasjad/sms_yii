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
                    <li class="active"><?php echo CHtml::link(Yii::t('employees', 'Contact'), array('contact', 'id' => $_REQUEST['id'])); ?></li>
                    <li><?php echo CHtml::link(Yii::t('employees', 'Additional Info'), array('addinfo', 'id' => $_REQUEST['id'])); ?></li>
                </ul>
                <div class="tab-content">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo Yii::t('employees', 'Contact'); ?></h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                    <tr>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Home Phone'); ?></td>
                                        <td class="subhdng_nrmal"><?php echo $model->home_phone; ?></td>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Office Phone1'); ?></td>
                                        <td class="subhdng_nrmal"><?php echo $model->office_phone1; ?></td>
                                    </tr>

                                    <tr>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Mobile Number'); ?></td>
                                        <td class="subhdng_nrmal"><?php echo $model->mobile_phone; ?></td>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Office Phone2'); ?></td>
                                        <td class="subhdng_nrmal"><?php echo $model->office_phone2; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Email'); ?></td>
                                        <td class="subhdng_nrmal"><?php echo $model->email; ?></td>
                                        <td class="listbx_subhdng"><?php echo Yii::t('employees', 'Fax'); ?></td>
                                        <td class="subhdng_nrmal"><?php echo $model->fax; ?></td>
                                    </tr>
                                </table>
                                <div class="ea_pdf" style="top:4px; right:6px;"><?php //echo CHtml::link('<img src="images/pdf-but.png">', array('Employees/pdf','id'=>$_REQUEST['id']));    ?></div>

                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
