
<?php
$this->breadcrumbs = array(
    'Students' => array('index'),
    'Create',
);
?>
<div class="row">
    <div class="col-md-3 col-sm-3">
        <?php $this->renderPartial('/default/left_side'); ?>
    </div>
    <div class="col-md-9 col-sm-9">
        <div class="box box-info ">
            <div class="box-header"><h3 class="box-title"><?php echo Yii::t('students', 'New Admission'); ?></h3></div>
            <div class="box-body nav-tabs-custom">
                <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
            </div>            
        </div>
    </div>
</div>
<?php
/*
?>
<table class="table">
    <tr>
        <td width="247" valign="top">
            <?php $this->renderPartial('/default/left_side'); ?>
        </td>
        <td valign="top">
            <div class="cont_right formWrapper">
                <h1><?php echo Yii::t('students', 'New Admission'); ?></h1>
                <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
            </div>
        </td>
    </tr>
</table>
<?php 
*/
?>