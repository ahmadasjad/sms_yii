<?php
$this->breadcrumbs = array(
    ucfirst($this->module->id) => array('inbox'),
    ucfirst($this->getAction()->getId())
);
?>

<div class="row">
    <div class="col-md-3 col-sm-3">
        <?php $this->renderPartial('/default/left_side'); ?>
    </div>
    <div class="col-md-9 col-sm-9">
        <div class="box box-info ">
            <div class="box-header"><h3 class="box-title">New Message<br/><span class="text-muted text-sm">Compose new message here.</span></h3></div>
            <div class="box-body nav-tabs-custom">
                <div >
                    <?php
                    $this->renderpartial('_menu');
                    ?>
                    <div class="mailbox-compose ui-helper-clearfix">

                        <?php
                        $this->renderPartial('_flash');


                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'message-form',
                            'enableAjaxValidation' => false,
                            'htmlOptions' => array('autocomplete' => $this->createUrl('ajax/auto')),
                        ));
                        ?>
                        <div class="formCon" style="margin:10px; padding:10px; width:710px;">	

                            <div class="formConInner" style="width:660px;">
                                <div class="row">
                                    <div class="col-sm-4">  
                                        <?php echo CHtml::activeLabelEx($conv, '<strong>To</strong>'); ?>
                                    </div>
                                    <div class="col-sm-8">   
                                        <div class="form-group">
                                            <?php
                                            echo CHtml::dropDownList("user_type", "", CHtml::listData(Authitem::model()->findAll("type=:type", array(':type' => 2)), "name", "name"), array(
                                                'id' => 'user_type',
                                                'class' => 'form-control'
                                            ));
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <?php
//                                            echo CHtml::dropDownList("to", "", "", array(
//                                                'id' => 'to',
//                                                'class' => 'form-control'
//                                            ));
                                            echo $form->dropdownlist($conv, 'to', array(), array(
                                                'id' => 'to',
                                                'class' => 'form-control'
                                            ))
                                            ?>
                                            <?php // echo $form->textField($conv, 'to', array('style' => 'width:30%;', 'id' => 'message-to', 'class' => 'mailbox-input', 'edit' => $this->module->editToField ? '1' : null)); ?>
                                            <?php echo $form->error($conv, 'to'); ?>
                                            <?php
                                            /* if ($this->module->userSupportList) {
                                              $reps = $this->module->getUserSupportList();
                                              echo '<select name="ajax[to]" class="mailbox-support-list" edit="' . (($this->module->editToField) ? '1' : null) . '" >';
                                              foreach ($reps as $key => &$label) {
                                              ?>
                                              <option type="hidden" value="<?php echo $key; ?>"><?php echo $label; ?></option>
                                              <?php

                                              }
                                              echo '</select>';
                                              } */
                                            ?>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-4">  
                                        <?php echo CHtml::activeLabelEx($conv, '<strong>Subject</strong>', array('class' => 'mailbox-label')); ?>
                                    </div>
                                    <div class="col-sm-8"> 
                                        <?php echo $form->textField($conv, 'subject', array('class' => 'form-control', 'style' => '', 'placeholder' => $this->module->defaultSubject, 'id' => 'subjectid')); ?>
                                        <?php echo $form->error($conv, 'subject'); ?>
                                    </div>                                    
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-12"> 
                                        <?php echo $form->textArea($msg, 'text', array('cols' => 50, 'rows' => 7, 'class' => 'mailbox-message-input', 'style' => 'width:100%;', 'placeholder' => 'Enter message here...')); ?>
                                        <?php echo $form->error($msg, 'text'); ?>
                                    </div>                                    
                                </div>
                                <div class="form-group pull-right">
                                    <button type="submit"  onclick="no_recieve()"  onclick=" no_subject();" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send Message</button>
                                </div>
                                
                            </div>
                        </div>
                        <?php $this->endWidget(); ?><!-- form --> 

                    </div> 
                </div>
            </div>            
        </div>
    </div>
</div>

<script type="text/javascript">
    function no_recieve()
    {
        if (document.getElementById("message-to").value == '')
        {
            alert("Add any recipient");
        }
    }

    function no_subject()
    {
        if (document.getElementById("subjectid").value == '')
        {
            confirm("Do you want to sent this message without subject?");
        }
    }
    jQuery(document).ready(function () {
        jQuery('select#user_type').change(function () {
            alert('hi');
            jQuery.ajax({
                url: '<?php echo Yii::app()->getBaseUrl(true); ?>/index.php?r=mailbox/message/getusers',
                type: 'post',
                data: {
                    user_type: jQuery(this).val()
                },
                success: function (data) {
                    jQuery('select#to').html(data);
                },
                error: function (xhr, status, error) {
                    console.log(xhr);
                }
            });
        });
    });
</script>
<!-- mailbox -->