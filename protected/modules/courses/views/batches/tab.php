<?php
Yii::app()->clientScript->registerCoreScript('jquery');

//IMPORTANT about Fancybox.You can use the newest 2.0 version or the old one
//If you use the new one,as below,you can use it for free only for your personal non-commercial site.For more info see
//If you decide to switch back to fancybox 1 you must do a search and replace in index view file for "beforeClose" and replace with 
//"onClosed"
// http://fancyapps.com/fancybox/#license
// FancyBox2
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js_plugins/fancybox2/jquery.fancybox.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/js_plugins/fancybox2/jquery.fancybox.css', 'screen');
// FancyBox
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/fancybox/jquery.fancybox-1.3.4.js', CClientScript::POS_HEAD);
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js_plugins/fancybox/jquery.fancybox-1.3.4.css','screen');
//JQueryUI (for delete confirmation  dialog)
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js_plugins/jqui1812/js/jquery-ui-1.8.12.custom.min.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/js_plugins/jqui1812/css/dark-hive/jquery-ui-1.8.12.custom.css', 'screen');
///JSON2JS
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js_plugins/json2/json2.js');


//jqueryform js
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js_plugins/ajaxform/jquery.form.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js_plugins/ajaxform/form_ajax_binding.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/js_plugins/ajaxform/client_val_form.css', 'screen');
?>

<script language="javascript">
    function getid()
    {
        var id = document.getElementById('drop').value;
        window.location = "index.php?r=batches/manage&id=" + id;
    }
</script>
<script>
    $(document).ready(function () {
        $(".act_but").click(function () {
            $('.act_drop').hide();
            if ($("#" + this.id + 'x').is(':hidden')) {

                $("#" + this.id + 'x').show();

            } else {
                $("#" + this.id + 'x').hide();
            }
            return false;
        });
        $('#' + this.id + 'x').click(function (e) {
            e.stopPropagation();
        });

    });
    $(document).click(function () {

        $('.act_drop').hide();

    });
</script>
<?php if (isset($_REQUEST['id'])) {
    ?>
    <h1>Manage Batch</h1>


    <?php
    $batch = Batches::model()->findByAttributes(array('id' => $_REQUEST['id']));
    if ($batch != NULL) {
        $course = Courses::model()->findByAttributes(array('id' => $batch->course_id));
        if ($course != NULL) {
            $coursename = $course->course_name;
            $batchname = $batch->name;
        } else {
            $coursename = '';
            $batchname = '';
        }
    }
    ?>


    <div class="c_batch_tbar">
        <?php
        /* if ((Yii::app()->controller->id == 'batches' and ( Yii::app()->controller->action->id == 'batchstudents' or Yii::app()->controller->action->id == 'settings')) or ( Yii::app()->controller->id == 'subject' and Yii::app()->controller->action->id == 'index') or ( Yii::app()->controller->id == 'weekdays' and ( Yii::app()->controller->action->id == 'timetable' or Yii::app()->controller->action->id == 'index')) or ( Yii::app()->controller->id == 'classTiming' and Yii::app()->controller->action->id == 'index') or ( Yii::app()->controller->id == 'studentAttentance' and Yii::app()->controller->action->id == 'index') or ( Yii::app()->controller->id == 'gradingLevels' and Yii::app()->controller->action->id == 'index') or ( Yii::app()->controller->id == 'exam' and Yii::app()->controller->action->id == 'index')) {
          ?>
          <?php
          $rurl = explode('index.php?r=', Yii::app()->request->getUrl());
          $rurl = explode('&id=', $rurl[1]);
          echo CHtml::ajaxLink('Change Batch', array('/site/explorer', 'widget' => '2', 'rurl' => $rurl[0]), array('update' => '#explorer_handler'), array('id' => 'explorer_change', 'class' => 'sb_but', 'style' => 'top:-40px; right:40px;'));
          ?>

          <?php
          } else {
          echo CHtml::ajaxLink('Change Batch', array('/site/explorer', 'widget' => '2', 'rurl' => 'courses/batches/batchstudents'), array('update' => '#explorer_handler'), array('id' => 'explorer_change', 'class' => 'sb_but', 'style' => 'top:-40px; right:40px;'));
          } */
        ?>

        <?php echo CHtml::link('Close', array('/courses'), array('class' => 'btn btn-primary btn-sm ', 'style' => 'top:-40px; right:0px;')); ?>
        <br/>
        <table class="table table-responsive table-bordered">
            <tr>
                <th>Course / Batch:</th>
                <td><?php echo $coursename; ?> / <?php echo $batchname; ?></td>
            </tr>
            <tr>
                <th><?php echo Yii::t('Batch', 'Class Teacher : '); ?></th>
                <td>
                    <?php
                    $employee = Employees::model()->findByAttributes(array('id' => $batch->employee_id));
                    if ($employee != NULL) {
                        echo ucfirst($employee->first_name) . ' ' . ucfirst($employee->middle_name) . ' ' . ucfirst($employee->last_name);
                    }
                    ?>
                </td>
            </tr>
        </table>
        <br/>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?php echo Yii::t('Batch', 'Students'); ?></span>
                        <span class="info-box-number"><?php echo count(Students::model()->findAll("batch_id=:x and is_deleted=:y", array(':x' => $_REQUEST['id'], ':y' => 0))); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?php echo Yii::t('Batch', 'Subjects'); ?></span>
                        <span class="info-box-number"><?php echo count(Subjects::model()->findAll("batch_id=:x", array(':x' => $_REQUEST['id']))); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?php echo Yii::t('Batch', 'Employees'); ?></span>
                        <span class="info-box-number"><?php echo count(TimetableEntries::model()->findAll(array('condition' => 'batch_id=:x', 'group' => 'employee_id', 'params' => array(':x' => $_REQUEST['id'])))); ?></span>
                    </div>
                </div>
            </div>

            <!--            <div class="status_bx">
                            <ul>
                                <li>
                                    <span><?php echo count(Students::model()->findAll("batch_id=:x and is_deleted=:y", array(':x' => $_REQUEST['id'], ':y' => 0))); ?></span>
            <?php echo Yii::t('Batch', 'Students'); ?>
                                </li>
                                <li><span>
            <?php echo count(Subjects::model()->findAll("batch_id=:x", array(':x' => $_REQUEST['id']))); ?>
                                    </span><?php echo Yii::t('Batch', 'Subjects'); ?></li>
                                <li><span>
            <?php echo count(TimetableEntries::model()->findAll(array('condition' => 'batch_id=:x', 'group' => 'employee_id', 'params' => array(':x' => $_REQUEST['id'])))); ?>
                                    </span><?php echo Yii::t('Batch', 'Employees'); ?></li>
                            </ul>
                            <div class="clear"></div>
                        </div>-->

        </div>
        <div style="position:absolute; top:27px; right:100px; ">
            <div id="tabdrop" class="act_but">Actions</div>
            <div class="act_drop" id="tabdropx">
                <div class="but_bg_outer"></div><div class="but_bg"><div id="1" class="act_but_hover">Actions</div></div>
                <ul>
                    <li class="addstud"><?php echo CHtml::link(Yii::t('Batch', 'Add Student<span>for add new student</span>'), array('/students/students/create', 'bid' => $_REQUEST['id'])) ?></li>
                    <li class="newsub"><?php echo CHtml::link(Yii::t('Batch', 'New Subject<span>for add new subject</span>'), array('#'), array('id' => 'add_subject-name-side')) ?></li>
                    <li class="mark"><?php echo CHtml::link(Yii::t('Batch', 'Mark Attendance<span>for add leave</span>'), array('/courses/studentAttentance', 'id' => $_REQUEST['id'])) ?></li>
                    <li class="promote"><?php echo CHtml::link(Yii::t('Batch', 'Promote Batch<span>for promote a batch</span>'), array('batches/promote', 'id' => $_REQUEST['id'])) ?></li>
                    <?php if ($batch->is_active == '1') {
                        ?>
                        <li class="deactivate"><?php echo CHtml::link(Yii::t('Batch', 'Deactivate Batch'), array('batches/deactivate', 'id' => $_REQUEST['id']), array('confirm' => 'Are You Sure,Deactivate This Batch ?')) ?></li><?php
                    } else {
                        ?>
                        <li class="deactivate"><?php echo CHtml::link(Yii::t('Batch', 'Activate Batch'), array('batches/activate', 'id' => $_REQUEST['id']), array('confirm' => 'Are You Sure,Activate This Batch ?')) ?></li><?php } ?>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <?php
    $ttabnot = 'cbi_red';
    $ttablink = '';
    $allgreen = 1;

    $week = Weekdays::model()->findByAttributes(array('batch_id' => $batch->id));
    if ($week == NULL) {
        $weeknot = '<div class="cbi_gray">Default Values Selected</div>';
        $weeklink = CHtml::link(Yii::t('Batch', 'Define Now ') . '', array('/courses/weekdays', 'id' => $_REQUEST['id']), array('class' => 'btn btn-primary btn-sm'));
        $allgreen = 0;
    } else {
        $weeknot = '<div class="cbi_green">Weekdays defined</div>';
        $weeklink = '';
    }


    $timing = ClassTimings::model()->findByAttributes(array('batch_id' => $batch->id));
    if ($timing == NULL) {
        $timingnot = 'No class timings defined';
        $ttabnot = 'Timetable not created';
        $timinglink = CHtml::link(Yii::t('Batch', 'Define Now') . '', array('#'), array('id' => 'add_class-timings-side', 'class' => 'btn btn-primary btn-sm'));
        $ttablink = '';
        $allgreen = 0;
    } else {
        $timingnot = 'Class Timings Defined';
        $timinglink = '';

        $ttab = TimetableEntries::model()->findByAttributes(array('batch_id' => $batch->id));
        if ($ttab == NULL) {
            $ttabnot = 'Timetable not created';
            $ttablink = CHtml::link(Yii::t('Batch', 'Create Now') . '</i>', array('weekdays/timetable', 'id' => $_REQUEST['id']), array('class' => 'btn btn-primary btn-sm'));
            $allgreen = 0;
        } else {
            $ttabnot = 'Timetable Created';
            $ttablink = '';
        }
    }

    $sub = Subjects::model()->findByAttributes(array('batch_id' => $batch->id));
    if ($sub == NULL) {
        $subnot = '0';
        $sublink = CHtml::link(Yii::t('Batch', 'Add Now') . '', array('#'), array('id' => 'add_subjects-side', 'class' => 'btn btn-primary btn-sm'));
        $allgreen = 0;
    } else {
        $subnot = 'Subjects Added';
        $sublink = '';
    }
    $stud = Students::model()->findByAttributes(array('batch_id' => $batch->id, 'is_active' => 1, 'is_deleted' => 0));
    if ($stud == NULL) {
        $studnot = '0';
        $studlink = CHtml::link(Yii::t('Batch', 'Add Student') . '</i>', array('/students/students/create'), array('class' => 'addstud btn btn-primary btn-sm'));
        $allgreen = 0;
    } else {
        $studnot = 'Active students';
        $studlink = '';
    }
    ?>
    <?php if ($allgreen == 0) {
        ?>
        <div class="row">
            <div class="col-md-3">
                <div class="box box-success" style="min-height: 112px;">
                    <div class="box-header with-border">
                        <h3 class="box-title">Active Students</h3>                  
                    </div>
                    <div class="box-body">
                        <div><?php echo $studnot; ?></div>
                        <?php echo $studlink; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-success" style="min-height: 112px;">
                    <div class="box-header with-border">
                        <h3 class="box-title">Subjects</h3>                  
                    </div>
                    <div class="box-body">
                        <div><?php echo $subnot; ?></div>
                        <?php echo $sublink; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-success" style="min-height: 112px;">
                    <div class="box-header with-border">
                        <h3 class="box-title">Weekdays</h3>                  
                    </div>
                    <div class="box-body">
                        <div><?php echo $weeknot; ?></div>
                        <?php echo $weeklink; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-success" style="min-height: 112px;">
                    <div class="box-header with-border">
                        <h3 class="box-title">Class Timings</h3>                  
                    </div>
                    <div class="box-body">
                        <div><?php echo $timingnot; ?></div>
                        <?php echo $timinglink; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-success" style="min-height: 112px;">
                    <div class="box-header with-border">
                        <h3 class="box-title">Timetable</h3>                  
                    </div>
                    <div class="box-body">
                        <div><?php echo $ttabnot; ?></div>
                        <?php echo $ttablink; ?>
                    </div>
                </div>
            </div>


            <!--            <div class="cbi_ibx cbi_ico3" style="border-left:none">
                            <h3>Active Students</h3>
            <?php echo $studnot; ?>
            <?php echo $studlink; ?>
                        </div>-->

            <!--            <div class="cbi_ibx cbi_ico5">
                            <h3>Subjects</h3>
            <?php echo $subnot; ?>
            <?php echo $sublink; ?>
                        </div>-->

            <!--            <div class="cbi_ibx cbi_ico1">
                            <h3>Weekdays</h3>
            <?php echo $weeknot; ?>
            <?php echo $weeklink; ?>
            
                        </div>-->


            <!--            <div class="cbi_ibx cbi_ico2">
                            <h3>Class Timings</h3>
            <?php echo $timingnot; ?>
            <?php echo $timinglink; ?>
                        </div>-->

            <!--            <div class="cbi_ibx cbi_ico4" style="border-right:none">
                            <h3>Timetable</h3>
            <?php echo $ttabnot; ?>
            <?php echo $ttablink; ?>
                        </div>-->

            <!--<div class="clear"></div>-->
        </div>
    <?php } ?>
    <?php $batch = Batches::model()->findByAttributes(array('id' => $_REQUEST['id'])); ?>


    <?php
    if ($batch != NULL) {
        ?>


        <div class="nav-tabs-custom">
            <ul  class="nav nav-tabs">
                <?php $active_class = (Yii::app()->controller->action->id == 'batchstudents') ? 'class="active"' : ''; ?>
                <li <?php echo $active_class; ?>>
                    <?php
                    echo CHtml::link(Yii::t('Batch', 'Students'), array('batches/batchstudents', 'id' => $_REQUEST['id']));
                    ?>

                </li>
                <?php $active_class = (Yii::app()->controller->id.'/'.Yii::app()->controller->action->id == 'subject/index') ? 'class="active"' : ''; ?>
                <li <?php echo $active_class; ?>>
                    <?php
                    echo CHtml::link(Yii::t('Batch', 'Subjects'), array('/courses/subject', 'id' => $_REQUEST['id']));
                    ?>
                </li>

                <?php $active_class = (Yii::app()->controller->action->id == 'timetable') ? 'class="active"' : ''; ?>
                <li <?php echo $active_class; ?>>
                    <?php
                    echo CHtml::link(Yii::t('Batch', 'Timetable'), array('weekdays/timetable', 'id' => $_REQUEST['id']));
                    ?>
                </li>

                <?php $active_class = (Yii::app()->controller->id.'/'.Yii::app()->controller->action->id == 'studentAttentance/index') ? 'class="active"' : ''; ?>
                <li <?php echo $active_class; ?>>
                    <?php
                    //echo Yii::app()->controller->action->id;
                    echo CHtml::link(Yii::t('Batch', 'Attendances'), array('/courses/studentAttentance', 'id' => $_REQUEST['id']));
                    ?>
                </li>

                <?php $active_class = (Yii::app()->controller->id.'/'.Yii::app()->controller->action->id == 'exam/index') ? 'class="active"' : ''; ?>
                <li <?php echo $active_class; ?>>
                    <?php                    
                    echo CHtml::link(Yii::t('Batch', 'Assessments'), array('/courses/exam/index', 'id' => $_REQUEST['id']));
                    ?>

                </li>


                <?php $active_class = (Yii::app()->controller->action->id == 'settings') ? 'class="active"' : ''; ?>
                <li <?php echo $active_class; ?>>
                    <?php
                    echo CHtml::link(Yii::t('Batch', 'Settings'), array('batches/settings', 'id' => $_REQUEST['id']));
                    ?>
                </li>



            </ul>
        </div>
        <?php
    }
}
?>
<div id="subjects-grid-side"></div>
<div id="class-timings-grid-side"></div>
<div id="events-grid-side"></div>
<div id="subject-name-grid-side"></div>
<script>
    //CREATE 

    $('#add_subjects-side').bind('click', function () {
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=courses/subject/returnForm",
            data: {"batch_id":<?php echo $_GET['id']; ?>, "YII_CSRF_TOKEN": "<?php echo Yii::app()->request->csrfToken; ?>"},
            beforeSend: function () {
                $("#subjects-grid-side").addClass("ajax-sending");
            },
            complete: function () {
                $("#subjects-grid-side").removeClass("ajax-sending");
            },
            success: function (data) {
                $.fancybox(data,
                        {"transitionIn": "elastic",
                            "transitionOut": "elastic",
                            "speedIn": 600,
                            "speedOut": 200,
                            "overlayShow": false,
                            "hideOnContentClick": false,
                            "afterClose": function () {
                                window.location.reload();
                            }  //onclosed function
                        });//fancybox
            } //success
        });//ajax
        return false;
    });//bind


    //CREATE 

    $('#add_class-timings-side').bind('click', function () {
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=courses/classTiming/returnForm",
            data: {"batch_id":<?php echo $_GET['id']; ?>, "YII_CSRF_TOKEN": "<?php echo Yii::app()->request->csrfToken; ?>"},
            beforeSend: function () {
                $("#class-timings-grid-side").addClass("ajax-sending");
            },
            complete: function () {
                $("#class-timings-grid-side").removeClass("ajax-sending");
            },
            success: function (data) {
                $.fancybox(data,
                        {"transitionIn": "elastic",
                            "transitionOut": "elastic",
                            "speedIn": 600,
                            "speedOut": 200,
                            "overlayShow": false,
                            "hideOnContentClick": false,
                            "afterClose": function () {
                                window.location.reload();
                            } //onclosed function
                        });//fancybox
            } //success
        });//ajax
        return false;
    });//bind

    //CREATE 

    $('#add_events-side').bind('click', function () {
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=courses/events/returnForm",
            data: {"YII_CSRF_TOKEN": "<?php echo Yii::app()->request->csrfToken; ?>"},
            beforeSend: function () {
                $("#events-grid-side").addClass("ajax-sending");
            },
            complete: function () {
                $("#events-grid-side").removeClass("ajax-sending");
            },
            success: function (data) {
                $.fancybox(data,
                        {"transitionIn": "elastic",
                            "transitionOut": "elastic",
                            "speedIn": 600,
                            "speedOut": 200,
                            "overlayShow": false,
                            "hideOnContentClick": false,
                            "afterClose": function () {
                                window.location.reload();
                            } //onclosed function
                        });//fancybox
            } //success
        });//ajax
        return false;
    });//bind

    //CREATE 

    $('#add_subject-name-side').bind('click', function () {
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=courses/defaultsubjects/returnForm",
            data: {"YII_CSRF_TOKEN": "<?php echo Yii::app()->request->csrfToken; ?>"},
            beforeSend: function () {
                $("#subject-name-grid-side").addClass("ajax-sending");
            },
            complete: function () {
                $("#subject-name-grid-side").removeClass("ajax-sending");
            },
            success: function (data) {
                $.fancybox(data,
                        {"transitionIn": "elastic",
                            "transitionOut": "elastic",
                            "speedIn": 600,
                            "speedOut": 200,
                            "overlayShow": false,
                            "hideOnContentClick": false,
                            "afterClose": function () {
                                window.location.reload();
                            } //onclosed function
                        });//fancybox
            } //success
        });//ajax
        return false;
    });//bind
</script>