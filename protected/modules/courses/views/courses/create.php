<?php
$this->breadcrumbs = array(
    'Courses' => array('/courses'),
    'Create',
);
?>
<div class="row">
    <div class="col-md-3 col-sm-3">
        <?php $this->renderPartial('left_side'); ?>
    </div>
    <div class="col-md-9 col-sm-9">
        <div class="box box-info ">
            <div class="box-body nav-tabs-custom">
                <?php echo $this->renderPartial('_form', array('model' => $model, 'model_1' => $model_1)); ?>
            </div>            
        </div>
    </div>
</div>
<!--<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="247" valign="top">
            <?php //$this->renderPartial('left_side'); ?>
        </td>
        <td valign="top">
            <div class="cont_right formWrapper">

                <h1><?php //echo Yii::t('courses', 'Create Course'); ?></h1><br />

                <?php //echo $this->renderPartial('_form', array('model' => $model, 'model_1' => $model_1)); ?>

            </div>
        </td>
    </tr>
</table>-->
