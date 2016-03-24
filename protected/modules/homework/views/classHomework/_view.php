<?php
/* @var $this ClassHomeworkController */
/* @var $data ClassHomework */
?>


<div class="row">
    <div class="col-sm-4">
        <!--    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
        <br />-->
    </div>
    <div class="col-sm-8">

    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <b><?php echo CHtml::encode($data->getAttributeLabel('batch_id')); ?>:</b>

    </div>
    <div class="col-sm-8">
        <?php
        //echo @Batches::model()->findAll("name", "id=:batch_id", array(':batch_id' => $data->batch_id))[0]->name;
        echo @Batches::model()->findAll("id=:batch_id", array(':batch_id' => $data->batch_id))[0]->name;
        ?>
        <?php //echo  CHtml::encode($data->batch_id); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <b><?php echo CHtml::encode('Assigined By'); ?>:</b>
    </div>
    <div class="col-sm-8">
        <?php
        echo @Employees::model()->findAll("id=:employee_id", array(':employee_id' => $data->employee_id))[0]->first_name;
        ?>
        <?php //echo CHtml::encode($data->employee_id); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <b><?php echo CHtml::encode($data->getAttributeLabel('subject_id')); ?>:</b>
    </div>
    <div class="col-sm-8">
        <?php
        echo @Subjects::model()->findAll("id=:subject_id", array(':subject_id' => $data->subject_id))[0]->name;
        ?>
        <?php //echo CHtml::encode($data->subject_id); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <b><?php echo CHtml::encode($data->getAttributeLabel('homework_title')); ?>:</b>
    </div>
    <div class="col-sm-8">
        <?php echo CHtml::encode($data->homework_title); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <b><?php echo CHtml::encode($data->getAttributeLabel('homework_description')); ?>:</b>
    </div>
    <div class="col-sm-8">
        <?php echo CHtml::encode($data->homework_description); ?>
    </div>
</div>
<hr/>