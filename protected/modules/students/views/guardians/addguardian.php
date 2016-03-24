<?php
$this->breadcrumbs = array(
    'Guardians' => array('admin'),
    'Guardian Details',
);
?>
<div class="row">
    <div class="col-md-3 col-sm-3">
        <?php $this->renderPartial('/default/left_side'); ?>
    </div>
    <div class="col-md-9 col-sm-9">
        <div class="box box-info ">
            <!--<div class="box-header"><?php echo Yii::t('students', 'New Admission'); ?></div>-->
            <div class="box-body nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li><a href="javascript:void(0);">Student Details</a></li>
                    <li><a href="javascript:void(0);">Parent Details</a></li>
                    <li class="active"><a href="javascript:void(0);">Emergency Contact</a></li>
                    <li><a href="javascript:void(0);">Previous Details</a></li>
                    <li class="last"><a href="javascript:void(0);">Student Profile</a></li>
                </ul>
                <div class="row">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'guardians-form',
                        'enableAjaxValidation' => false,
                    ));
                    ?>
                    <div class="col-sm-6">
                        <?php echo Yii::t('students', 'Guardian Name'); ?>
                    </div>
                    <div class="col-sm-6">
                        <?php echo Yii::t('students', 'Relationship'); ?>
                    </div>
                    <?php
                    echo $form->hiddenField($model, 'ward_id', array('value' => $_REQUEST['id']));

                    //echo Yii::app()->controller->action->id;
                    $guardian = Students::model()->findByAttributes(array('id' => $_REQUEST['id']));
                    $posts = Guardians::model()->findAll("id=:x", array(':x' => $guardian->parent_id));

                    foreach ($posts as $posts_1) {
                        ?>
                        <div class="col-sm-6">
                            <?php echo $form->radioButton($model, 'radio', array('value' => $posts_1->id)); ?>
                            <?php echo CHtml::link($posts_1->first_name, array('guardians/view', 'id' => $posts_1->id)); ?>
                        </div>
                        <?php
                        ?>
                        <div class="col-sm-6">
                            <?php echo $posts_1->relation; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="col-sm-4">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Previous Details »' : 'Save', array('class' => 'btn btn-primary')); ?>
                    </div>
                </div>
                <?php $this->endWidget(); ?>
            </div>                       
        </div>
    </div>
</div>
