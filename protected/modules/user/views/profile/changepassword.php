<?php
$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Change Password");
$this->breadcrumbs = array(
    UserModule::t("Profile") => array('/user/profile'),
    UserModule::t("Change Password"),
);
?>


<div class="row">
    <div class="col-md-3 col-sm-3">
        <?php $this->renderPartial('//configurations/left_side'); ?>
    </div>
    <div class="col-md-9 col-sm-9">
        <div class="box box-info ">
            <div class="box-header"><h3 class="box-title"><?php echo UserModule::t('Change password'); ?></h3></div>
            <div class="box-body nav-tabs-custom">
                <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

                <div style="background:#FFF;">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'changepassword-form',
                        'enableAjaxValidation' => true,
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                    ));
                    ?>
                    <?php echo $form->errorSummary($model); ?>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <?php echo $form->labelEx($model, Yii::t('user', 'oldPassword')); ?>

                        </div>
                        <div class="col-sm-8 form-group">
                            <?php echo $form->passwordField($model, 'oldPassword', array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'oldPassword'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <?php echo $form->labelEx($model, Yii::t('user', 'password')); ?>
                        </div>
                        <div class="col-sm-8 form-group">
                            <?php echo $form->passwordField($model, 'password', array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'password'); ?>
                            <p class="hint">
                                <?php echo UserModule::t("Minimal password length 4 symbols."); ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <?php echo $form->labelEx($model, Yii::t('user', 'verifyPassword')); ?>
                        </div>
                        <div class="col-sm-8 form-group">
                            <?php echo $form->passwordField($model, 'verifyPassword', array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'verifyPassword'); ?>
                        </div>
                    </div>
                    
                    <div class="row submit">
                        <div class="col-sm-12">
                            <?php echo CHtml::submitButton(UserModule::t("Save"),array('class'=>'btn btn-primary btn-sm')); ?>
                        </div>
                        
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>            
        </div>
    </div>
</div>

