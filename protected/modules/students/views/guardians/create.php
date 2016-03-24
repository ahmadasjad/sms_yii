<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,400italic' rel='stylesheet' type='text/css'>-->

<style>
    .guard_search
    {
        position:relative;
        width:auto;
        padding-left:5px;
        padding-right:27px;
    }

    .radio_bx
    {
        margin:0px;
        padding:0px;
    }

    input[type="radio"] {
        display:none;
    }

    input[type="radio"] + label {
        font-family: 'Open Sans', sans-serif;
        font-size:15px;
        font-weight:600;
        color:#be8b05;
        padding:10px 0px 10px 0px;
    }

    input[type="radio"] + label span {
        display:inline-block;
        width:22px;
        height:22px;
        margin:-1px 4px 0 0;
        vertical-align:middle;
        background: url(images/radio_btn_css3.png) -48px top no-repeat;
        cursor:pointer;
        padding-left:10px;
    }

    input[type="radio"]:checked + label span {
        background:url(images/radio_btn_css3.png) 0px top no-repeat;
    }
    div#show {
        padding:10px;


    }
    .formConInner {
        padding: 15px;
        position: relative;
        width: 680px;
    }

    .formCon
    {
        margin-bottom:20px;
    }
</style>

<script>
    /*jQuery.fn.reset = function () {
     $(this).each (function() { this.reset(); });
     }*/
    function getmode()
    {
        var guardian_mode = $('input[name=guardian]:checked').val();
        //alert(guardian_mode);
        if (guardian_mode == 1)
        {
            $("#search").show("slow");
            //$( "#new_guardian").hide();	
            //$( "#existing_guardian").show();	
        } else
        {
            var ward_id = $("#Guardians_ward_id").val();
            $("#search").hide("slow", function () {
                window.location = "index.php?r=students/guardians/create&id=" + ward_id;
            });
            /*$( "#search" ).hide("slow");
             $('#guardians-form').find("input[type=text],textarea,select").val("");	
             $( "#new_guardian").show();
             $( "#existing_guardian").hide();	*/
        }

    }
</script>

<?php
$this->breadcrumbs = array(
    'Guardians' => array('admin'),
    'Create',
);
?>


<div class="row">
    <div class="col-md-3 col-sm-3">
        <?php $this->renderPartial('/default/left_side'); ?>
    </div>
    <div class="col-md-9 col-sm-9">
        <div class="box box-info ">
            <div class="box-body nav-tabs-custom">
                <div class="cont_right formWrapper">
                    <div class="captionWrapper ">
                        <ul class="nav nav-tabs">
                            <li><a href="javascript:void(0);">Student Details</a></li>
                            <li class="active"><a href="javascript:void(0);">Parent Details</a></li>
                            <li><a href="javascript:void(0);">Emergency Contact</a></li>
                            <li><a href="javascript:void(0);">Previous Details</a></li>
                            <li class="last"><a href="javascript:void(0);">Student Profile</a></li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <?php
                            if ($radio_flag == 1) {
                                $radio1 = true;
                                $radio2 = false;
                                $style = 'display:block;';
                            } else {
                                $radio1 = false;
                                $radio2 = true;
                                $style = 'display:none;';
                            }

                            // Already Existing Guardian Radio Button
                            echo CHtml::radioButton('guardian', $radio1, array(
                                'checked' => true,
                                'id' => 'guardian1',
                                'value' => '1',
                                'class' => 'form-control',
                                'labelOptions' => array('style' => 'display:inline;padding-right:20px;'),
                                'onchange' => 'getmode();',
                            ));
                            ?>
                            <label for="guardian1"><span></span>Already Existing Parent</label>
                        </div>  
                        <div class="col-sm-6">
                            <?php
                            // New Guardian Radio Button
                            echo CHtml::radioButton('guardian', $radio2, array(
                                'value' => '0', 'uncheckValue' => null,
                                'id' => 'guardian2',
                                'labelOptions' => array('style' => 'display:inline;padding-right:20px;'),
                                'onchange' => 'getmode();',
                            ));
                            ?><label for="guardian2"><span></span>New Parent</label>
                        </div>                      
                    </div>
                    <div class="row"  id="search" style=" <?php echo $style; ?>; margin-bottom:0px; margin-top:0px;">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'guardians-search-form',
                            'enableAjaxValidation' => false,
                        ));
                        ?>
                        <div class="col-sm-3">
                            <?php
                            $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                                'name' => 'student_name',
                                'id' => 'name_widget',
                                'source' => $this->createUrl('/site/autocomplete'),
                                'htmlOptions' => array('placeholder' => 'Sibilings','class'=>'form-control'),
                                'options' =>
                                array(
                                    'showAnim' => 'fold',
                                    'select' => "js:function(student, ui) {
						$('#id_widget').val(ui.item.id);
						
						}"
                                ),
                            ));
                            ?>
                            <?php echo CHtml::hiddenField('student_id', '', array('id' => 'id_widget')); ?> 
                        </div>
                        <div class="col-sm-3">
                            <?php
                            $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                                'name' => 'parent_name',
                                'id' => 'parent_name_widget',
                                'source' => $this->createUrl('/site/parentautocomplete'),
                                'htmlOptions' => array('placeholder' => 'Parent','class'=>'form-control'),
                                'options' =>
                                array(
                                    'showAnim' => 'fold',
                                    'select' => "js:function(parent, ui) {
						$('#guardian_id').val(ui.item.id);
						
						}"
                                ),
                            ));
                            ?>
                            <?php echo CHtml::hiddenField('guardian_id', '', array('id' => 'guardian_id')); ?> 
                        </div>
                        <div class="col-sm-3">
                            <?php
                            $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                                'name' => 'parent_email',
                                'id' => 'parent_email_widget',
                                'source' => $this->createUrl('/site/parentemailcomplete'),
                                'htmlOptions' => array('placeholder' => 'Parent Email','class'=>'form-control'),
                                'options' =>
                                array(
                                    'showAnim' => 'fold',
                                    'select' => "js:function(parentemail, ui) {
						$('#guardian_mail').val(ui.item.id);
						
						}"
                                ),
                            ));
                            ?>
                            <?php echo CHtml::hiddenField('guardian_mail', '', array('id' => 'guardian_mail')); ?>                    
                        </div>
                        <div class="col-sm-3">
                            <?php echo CHtml::button('Select', array('submit' => array('guardians/create', 'id' => $_REQUEST['id']), 'class' => 'btn btn-primary')); ?>
                        </div>
                        <?php $this->endWidget(); ?>
                    </div>


                    <?php
                    if ($guardian_id) {
                        //echo $guardian_id;
                        echo $this->renderPartial('_form', array('model' => $model, 'check_flag' => $check_flag, 'guardian_id' => $guardian_id));
                    } else {
                        echo $this->renderPartial('_form', array('model' => $model, 'check_flag' => $check_flag));
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
