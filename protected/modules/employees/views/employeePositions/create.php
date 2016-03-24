<?php
$this->breadcrumbs=array(
	'Employee Positions'=>array('admin'),
	'Create',
);


?>
<div class="row">
    <div class="col-md-3 col-sm-3">
        <?php $this->renderPartial('/employees/left_side');?>
    </div>
    <div class="col-md-9 col-sm-9">
        <div class="box box-info ">
            <div class="box-header"><h3 class="box-title"><?php echo Yii::t('employees','Create New Employee Position');?></h3></div>
            <div class="box-body nav-tabs-custom">
                <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
            </div>            
        </div>
    </div>
</div>
