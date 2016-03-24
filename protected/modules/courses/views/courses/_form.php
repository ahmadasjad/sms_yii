<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'courses-form',
    'enableAjaxValidation' => false,
        ));
?>
<div class="formCon ">
    <div class="formConInner panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">Course</h3></div>
        <div class="panel-body">
            <div class="row">
                <?php /* ?><?php echo $form->errorSummary($model); ?><?php */ ?>
                <div class="col-sm-12 form-group">
                    <?php echo $form->labelEx($model, Yii::t('Courses', 'course_name')); ?>
                    <?php echo $form->textField($model, 'course_name', array('size' => 40, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'course_name'); ?>
                </div>
                <div class="col-sm-12 form-group">
                    <?php echo $form->labelEx($model, Yii::t('Courses', 'code')); ?>
                    <?php echo $form->textField($model, 'code', array('size' => 40, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'code'); ?>
                </div>
                <div class="col-sm-12 form-group">
                    <?php echo $form->labelEx($model, Yii::t('Courses', 'section_name')); ?>
                    <?php echo $form->textField($model, 'section_name', array('size' => 40, 'maxlength' => 255, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'section_name'); ?>
                </div>
                <?php
                $daterange = date('Y') + 20;
                $daterange_1 = date('Y') - 30;
                ?>
                <?php //echo $form->labelEx($model,'is_deleted'); ?>
                <?php echo $form->hiddenField($model, 'is_deleted'); ?>
                <?php echo $form->error($model, 'is_deleted'); ?>
                <?php //echo $form->labelEx($model,'created_at'); ?>
                <?php
                if (Yii::app()->controller->action->id == 'create') {
                    echo $form->hiddenField($model, 'created_at', array('value' => date('Y-m-d')));
                } else {
                    echo $form->hiddenField($model, 'created_at');
                }
                ?>
                <?php echo $form->error($model, 'created_at'); ?>
                <?php //echo $form->labelEx($model,'updated_at'); ?>
                <?php echo $form->hiddenField($model, 'updated_at', array('value' => date('Y-m-d'))); ?>
                <?php echo $form->error($model, 'updated_at'); ?>
            </div>
        </div>
    </div>

    <?php
    if (Yii::app()->controller->action->id == 'create') {
        ?> 
        <div class="formConInner panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title">Batch</h3></div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-sm-12 form-group">
                        <?php echo $form->labelEx($model_1, Yii::t('Courses', 'name')); ?>
                        <?php echo $form->textField($model_1, 'name', array('size' => 40, 'maxlength' => 255, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model_1, 'name'); ?>
                    </div>
                    <div class="col-sm-12 form-group">
                        <?php echo $form->labelEx($model_1, Yii::t('Courses', 'start_date')); ?>
                        <?php
                        //echo $form->textField($model_1,'start_date');
                        $settings = UserSettings::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
                        if ($settings != NULL) {

                            $date = $settings->dateformat;
                        } else
                            $date = 'dd-mm-yy';
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model_1,
                            'attribute' => 'start_date',
                            // additional javascript options for the date picker plugin
                            'options' => array(
                                'showAnim' => 'fold',
                                'dateFormat' => $date,
                                'changeMonth' => true,
                                'changeYear' => true,
                                'yearRange' => $daterange_1 . ':' . $daterange,
                            ),
                            'htmlOptions' => array(
                                'style' => '',
                                'class' => 'form-control'
                            ),
                        ));
                        ?>
                        <?php echo $form->error($model_1, 'start_date'); ?>
                    </div>
                    <div class="col-sm-12 form-group">
                        <?php echo $form->labelEx($model_1, Yii::t('Courses', 'end_date')); ?>
                        <?php
                        //echo $form->textField($model_1,'end_date');
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model_1,
                            'attribute' => 'end_date',
                            // additional javascript options for the date picker plugin
                            'options' => array(
                                'showAnim' => 'fold',
                                'dateFormat' => $date,
                                'changeMonth' => true,
                                'changeYear' => true,
                                'yearRange' => $daterange_1 . ':' . $daterange,
                            ),
                            'htmlOptions' => array(
                                'style' => '',
                                'class' => 'form-control'
                            ),
                        ));
                        ?>
                        <?php echo $form->error($model_1, 'end_date'); ?>
                    </div>
                    <?php /* ?><?php echo $form->labelEx($model_1,'course_id'); ?><?php */ ?>
                    <?php //echo $form->hiddenField($model_1,'course_id',array('value'=>0));  ?>
                    <?php //echo $form->error($model_1,'course_id');  ?>

                    <?php //echo $form->labelEx($model_1,'is_active');  ?>
                    <?php echo $form->hiddenField($model_1, 'is_active'); ?>
                    <?php echo $form->error($model_1, 'is_active'); ?>

                    <?php //echo $form->labelEx($model_1,'is_deleted');  ?>
                    <?php echo $form->hiddenField($model_1, 'is_deleted'); ?>
                    <?php echo $form->error($model_1, 'is_deleted'); ?>

                    <?php //echo $form->labelEx($model_1,'employee_id');  ?>
                    <?php //echo $form->hiddenField($model_1,'employee_id',array('value'=>1));  ?>
                    <?php //echo $form->error($model_1,'employee_id');  ?>

                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => 'btn btn-primary')); ?>
</div>
<?php $this->endWidget(); ?>


