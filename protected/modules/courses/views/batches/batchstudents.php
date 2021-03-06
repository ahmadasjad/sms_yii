<?php
$this->breadcrumbs = array(
    'Batches' => array('/courses'),
    'Batches',
);
?>
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
<?php
Yii::app()->clientScript->registerScript(
        'myHideEffect', '$(".info").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
);
?>


<?php $batch = Batches::model()->findByAttributes(array('id' => $_REQUEST['id'])); ?>

<div class="row">

    <div class="col-md-12 col-sm-12">
        <div class="box box-info ">
            <div class="box-header"><h3 class="box-title"></h3></div>
            <div class="box-body nav-tabs-custom">
                <?php
                if ($batch != NULL) {
                    ?>
                    <?php $this->renderPartial('tab'); ?>
                    <div class="clear"></div>
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h3 class="panel-title">Active Student</h3></div>
                        <div class="panel-body">
                            <div class="pull-right">
                                <?php echo CHtml::link('<span>' . Yii::t('Batch', 'Add Student') . '</span>', array('/students/students/create', 'bid' => $_REQUEST['id']), array('class' => 'btn btn-primary btn-sm')); ?>
                            </div>
                            <?php if (Yii::app()->user->hasFlash('success')): ?>
                                <div class="info" style="background-color:#C30; width:800px; height:30px">
                                    <?php echo Yii::app()->user->getFlash('success'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="table_listbx">
                                <?php
                                if (isset($_REQUEST['id'])) {
                                    $posts = Students::model()->findAll("batch_id=:x and is_deleted=:y and is_active=:z", array(':x' => $_REQUEST['id'], ':y' => '0', ':z' => '1'));
                                    if ($posts != NULL) {
                                        ?>
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tr class="listbxtop_hdng">
                                                <td ><?php echo Yii::t('Batch', 'Sl no.'); ?></td>
                                                <td ><?php echo Yii::t('Batch', 'Student Name'); ?></td>
                                                <td ><?php echo Yii::t('Batch', 'Admission Number'); ?></td>
                                                <td ><?php echo Yii::t('Batch', 'Gender'); ?></td>
                                                <td ><?php echo Yii::t('Batch', 'Actions'); ?></td>
                                            </tr>
                                            <?php
                                            $i = 0;
                                            foreach ($posts as $posts_1) {
                                                $i++;
                                                echo '<tr>';
                                                echo '<td>' . $i . '</td>';
                                                echo '<td>' . CHtml::link(ucfirst($posts_1->first_name) . ' ' . ucfirst($posts_1->middle_name) . ' ' . ucfirst($posts_1->last_name), array('/students/students/view', 'id' => $posts_1->id)) . '</td>';
                                                echo '<td>' . $posts_1->admission_no . '</td>';
                                                ?>
                                                <td><?php
                                                    if ($posts_1->gender == 'M') {
                                                        echo 'Male';
                                                    } elseif ($posts_1->gender == 'F') {
                                                        echo 'Female';
                                                    }
                                                    ?></td>
                                                <td >
                                                    <div style="position:absolute;">
                                                        <div  id="<?php echo $i; ?>" class="act_but"><?php echo Yii::t('Batch', 'Actions'); ?></div>
                                                        <div class="act_drop" id="<?php echo $i . 'x'; ?>">
                                                            <div class="but_bg_outer"></div><div class="but_bg"><div  id="<?php echo $i; ?>" class="act_but_hover"><?php echo Yii::t('Batch', 'Actions'); ?></div></div>
                                                            <ul>
                                                                <li class="add"><?php echo CHtml::link(Yii::t('Batch', 'Add Leave') . '<span>' . Yii::t('Batch', 'for add leave') . '</span>', array('#'), array('class' => 'addevnt', 'name' => $posts_1->id)) ?></li>
                                                                <li class="delete"><?php echo CHtml::link(Yii::t('Batch', 'Make Inactive') . '<span>' . Yii::t('Batch', 'make students inactive') . '</span>', array('/students/students/inactive', 'sid' => $posts_1->id, 'id' => $_REQUEST['id']), array('confirm' => 'Are You Sure , Make Inactive ?')) ?></li>
                                                                <!--<li class="edit"><a href="#">Edit Leave<span>for add leave</span></a></li>
                                                                <li class="delete"><a href="#">Delete Leave<span>for add leave</span></a></li>
                                                                <li class="add"><a href="#">Add Fees<span>for add leave</span></a></li>
                                                                <li class="add"><a href="#">Add Report<span>for add leave</span></a></li>-->
                                                            </ul>
                                                        </div>
                                                        <div class="clear"></div>
                                                        <div id="<?php echo $posts_1->id ?>"></div>
                                                    </div>
                                                </td>
                                            <?php }
                                            ?>
                                        </table>
                                        <?php
                                    } else {
                                        echo '<br><div class="notifications nt_red" style="padding-top:10px">' . '<i>' . Yii::t('Batch', 'No Active Students In This Batch') . '</i></div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>


                    <div class="panel panel-primary">
                        <div class="panel-heading"><h3 class="panel-title"><?php echo Yii::t('Batch', 'Inactive Students'); ?></h3></div>
                        <div class="panel-body">
                            <?php
                            if (isset($_REQUEST['id'])) {
                                $posts = Students::model()->findAll("batch_id=:x and is_deleted=:y and is_active=:z", array(':x' => $_REQUEST['id'], ':y' => '0', ':z' => '0'));
                                if ($posts != NULL) {
                                    ?> <div class="table_listbx">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tr >
                                                <td class="listbx_subhdng"><?php echo Yii::t('Batch', 'Sl no.'); ?></td>
                                                <td class="listbx_subhdng"><?php echo Yii::t('Batch', 'Student Name'); ?></td>
                                                <td class="listbx_subhdng"><?php echo Yii::t('Batch', 'Admission Number'); ?></td>
                                                <td class="listbx_subhdng"><?php echo Yii::t('Batch', 'Gender'); ?></td>
                                                <td class="listbx_subhdng"><?php echo Yii::t('Batch', 'Actions'); ?></td>
                                            </tr>
                                            <?php
                                            $j = $i;
                                            $i = 0;
                                            foreach ($posts as $posts_1) {
                                                $i++;
                                                $j++;
                                                echo '<tr>';
                                                echo '<td>' . $i . '</td>';
                                                echo '<td>' . CHtml::link($posts_1->first_name, array('/students/students/view', 'id' => $posts_1->id)) . '</td>';
                                                echo '<td>' . $posts_1->admission_no . '</td>';
                                                ?>
                                                <td><?php
                                                    if ($posts_1->gender == 'M') {
                                                        echo 'Male';
                                                    } elseif ($posts_1->gender == 'F') {
                                                        echo 'Female';
                                                    }
                                                    ?></td>
                                                <td >
                                                    <div style="position:absolute;">
                                                        <div  id="<?php echo $j; ?>" class="act_but"><?php echo Yii::t('Batch', 'Actions'); ?></div>
                                                        <div class="act_drop" id="<?php echo $j . 'x'; ?>">
                                                            <div class="but_bg_outer"></div><div class="but_bg"><div  id="<?php echo $j; ?>" class="act_but_hover"><?php echo Yii::t('Batch', 'Actions'); ?></div></div>
                                                            <ul>

                                                                <li class="edit">

                                                                    <?php echo CHtml::link(Yii::t('Batch', 'Make Active') . '<span>' . Yii::t('Batch', 'make students active') . '</span>', array('/students/students/active', 'sid' => $posts_1->id, 'id' => $_REQUEST['id']), array('confirm' => 'Are You Sure , Make Active ?')) ?>

                                                                </li>



                                                                <li class="delete">

                                                                    <?php echo CHtml::link(Yii::t('Batch', 'Delete') . '<span>' . Yii::t('Batch', 'for deleting') . '</span>', array('/students/students/deletes', 'sid' => $posts_1->id, 'id' => $_REQUEST['id']), array('confirm' => 'Are You Sure , Delete ?')) ?>

                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="clear"></div>
                                                        <div id="<?php echo $posts_1->id ?>"></div>
                                                    </div>
                                                </td>
                                            <?php }
                                            ?>
                                        </table>
                                    </div>
                                    <?php
                                } else {
                                    echo '<br><div class="notifications nt_red" style="padding-top:10px">' . '<i>' . Yii::t('Batch', 'No InActive Students In This Batch') . '</i></div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                } else {
                    echo '<div class="emp_right" style="padding-left:20px; padding-top:50px;">';
                    echo '<div class="notifications nt_red">' . '<i>' . Yii::t('Batch', 'Nothing Found!!') . '</i></div>';
                    echo '</div>';
                }
                ?>
            </div>            
        </div>
    </div>
</div>



<script>
    //CREATE 

    $('.addevnt').bind('click', function () {
        var id = $(this).attr('name');
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=students/studentLeave/returnForm",
            data: {"id": id, "YII_CSRF_TOKEN": "<?php echo Yii::app()->request->csrfToken; ?>"},
            beforeSend: function () {
                $("#" + $(this).attr('name')).addClass("ajax-sending");
            },
            complete: function () {
                $("#" + $(this).attr('name')).removeClass("ajax-sending");
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




