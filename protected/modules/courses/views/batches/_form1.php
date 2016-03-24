<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'batches-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php
    Yii::app()->clientScript->registerScript(
            'myHideEffect', '$(".success_msg").animate({opacity: 1.0}, 4000).fadeOut("slow");', CClientScript::POS_READY
    );
    ?>

    <span id="success_msg" class="success_msg" style="font-size:14px; color:#C00; font-weight:bold; padding-left:20px; padding-top:5px;"></span>
    <p style="padding-left:20px;">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-sm-4">
            <?php echo $form->labelEx($model, Yii::t('batch', 'name')); ?>
        </div>

        <div class="col-sm-8">
            <?php echo $form->textField($model, 'name', array('size' => 30, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>
    </div>            
    <div class="row">
        <div class="col-sm-4">
            <?php echo $form->labelEx($model, Yii::t('batch', 'start_date')); ?>
        </div>
        <div class="col-sm-8">
            <?php
            $settings = UserSettings::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
            if ($settings != NULL) {
                $date = $settings->dateformat;
            } else
                $date = 'dd-mm-yy';

            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                //'name'=>'Students[admission_date]',
                'model' => $model,
                'attribute' => 'start_date',
                // additional javascript options for the date picker plugin
                'options' => array(
                    'showAnim' => 'fold',
                    'dateFormat' => $date,
                    'changeMonth' => true,
                    'changeYear' => true,
                    'yearRange' => '1900:'
                ),
                'htmlOptions' => array(
                    'style' => '', 'class' => 'form-control'
                ),
            ));
            ?>
            <?php echo $form->error($model, 'start_date'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <?php echo $form->labelEx($model, Yii::t('batch', 'end_date')); ?>
        </div>
        <div class="col-sm-8">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                //'name'=>'Students[admission_date]',
                'model' => $model,
                'attribute' => 'end_date',
                // additional javascript options for the date picker plugin
                'options' => array(
                    'showAnim' => 'fold',
                    'dateFormat' => $date,
                    'changeMonth' => true,
                    'changeYear' => true,
                    'yearRange' => '1900:' . (date('Y') + 30),
                ),
                'htmlOptions' => array(
                    'style' => '', 'class' => 'form-control'
                ),
            ));
            ?>
            <?php echo $form->error($model, 'end_date'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <?php echo $form->labelEx($model, Yii::t('Batch', 'Teacher')); ?>
        </div>
        <?php
        $criteria = new CDbCriteria;
        $criteria->condition = 'is_deleted=:is_del';
        $criteria->params = array(':is_del' => 0);
        ?>
        <div class="col-sm-8">
            <?php echo $form->dropDownList($model, 'employee_id', CHtml::listData(Employees::model()->findAll($criteria), 'id', 'concatened'), array('empty' => 'Select Class Teacher', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'employee_id'); ?>
        </div>
    </div>
    <div class="row">

        <div class="col-sm-4">
            <?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save');               ?>
            <?php
            echo CHtml::ajaxSubmitButton(Yii::t('job', 'Save'), CHtml::normalizeUrl(array('Batches/Addupdate&val1=' . $batch_id, 'render' => false)), array('success' => 'js: function(data) {
									 $("#success_msg").html("Batch updated successfully!");
									 setTimeout(function() {
											$("#jobDialog123").dialog("close"); 
									 		window.location.reload();
									 }, 1000);
									 
									 }',), array('id' => 'closeJobDialog', 'name' => 'Submit','class'=>'btn btn-primary btn-sm'));
            ?>
        </div>
    </div>


    <div class="row">
        <?php //echo $form->labelEx($model,'course_id'); 
        ?>
        <?php echo $form->hiddenField($model, 'course_id', array('value' => $val1)); ?>
        <?php echo $form->error($model, 'course_id'); ?>
    
        
        <?php //echo $form->labelEx($model,'is_active');    ?>
        <?php echo $form->hiddenField($model, 'is_active'); ?>
        <?php echo $form->error($model, 'is_active'); ?>
    
        
        <?php //echo $form->labelEx($model,'is_deleted');    ?>
        <?php echo $form->hiddenField($model, 'is_deleted'); ?>
        <?php echo $form->error($model, 'is_deleted'); ?>
    
        
        
        <?php //echo $form->labelEx($model,'employee_id');    ?>
        <?php /* ?><?php echo $form->textField($model,'employee_id',array('value'=>1)); ?>
          <?php echo $form->error($model,'employee_id'); ?><?php */ ?>
    </div>
    

    <?php $this->endWidget(); ?>

</div><!-- form -->