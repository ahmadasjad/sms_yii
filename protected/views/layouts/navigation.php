<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/public/design/dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?php echo @$_SESSION['Admin']['full_name']; ?></p>
            <a href="javascript:void(0)"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <?php
//        $top_level_menus =Menu::model()->findAll('parent_id IS NULL');
//        
//        foreach ($top_level_menus as $top_level_menu){
//            echo '<li>';
//            echo CHtml::link(Yii::t('app', $top_level_menu->title), array('/'.$top_level_menu->url), array('class' => 'active'));
//            echo '</li>';
//            //var_dump($top_level_menu->title);
//        }
        //var_dump($_SESSION);
        foreach ($_SESSION['menus'] as $key=>$menu) {
            if (!empty($_SESSION['child_menu'][$key])) {
                echo '<li class="treeview">';
                echo CHtml::link('<i class="fa fa-th"></i><span>' . @$menu['title'] . '</span><i class="fa fa-angle-left pull-right"></i>', array('/' . @$menu['url']), array('class' => 'active'));
            }else{
                echo '<li>';
                echo CHtml::link('<i class="fa fa-th"></i><span>' . @$menu['title'] . '</span>', array('/' . @$menu['url']), array('class' => 'active'));
            }
            
            //var_dump($menu);
            if (!empty($_SESSION['child_menu'][$key])) {
                echo '<ul class="treeview-menu menu-open">';
                foreach ($_SESSION['child_menu'][$key] as $child_menu) {
                    echo '<li>';
                    echo CHtml::link('<i class="fa fa-circle-o"></i><span>' . $child_menu['title'] . '</span>', array('/' . $child_menu['url']), array('class' => 'active'));
                    echo '</li>';
                }
                echo '</ul>';
            }
            echo '</li>';
        }
        ?>
        <!--        <li class="header">MAIN NAVIGATION</li>
                <li>
        <?php
//            if (isset(Yii::app()->controller->module->id)) {
//                if (Yii::app()->controller->module->id == 'mailbox' || Yii::app()->controller->module->id == 'dashboard' || Yii::app()->controller->module->id == 'cal') {
//                    echo CHtml::link(Yii::t('app', 'Home'), array('/default'), array('class' => 'ic1 active'));
//                } else {
//                    echo CHtml::link(Yii::t('app', 'Home'), array('/default'), array('class' => 'ic1'));
//                }
//            } else if (Yii::app()->controller->id == 'default') {
//                echo CHtml::link(Yii::t('app', 'Home'), array('/default'), array('class' => 'ic1 active'));
//            } else {
//                echo CHtml::link(Yii::t('app', 'Home'), array('/default'), array('class' => 'ic1'));
//            }
        ?>
                </li>
                <li>
        <?php
//            if (Yii::app()->controller->id == 'students' || Yii::app()->controller->id == 'guardians' || Yii::app()->controller->id == 'studentCategories' || Yii::app()->controller->id == 'studentCategory') {
//                echo CHtml::link(Yii::t('app', 'Students'), array('/students'), array('class' => 'ic2 active'));
//            } else {
//                echo CHtml::link(Yii::t('app', 'Students'), array('/students'), array('class' => 'ic2'));
//            }
        ?>
                </li>
                <li>
        <?php
//            if (isset(Yii::app()->controller->module->id) and Yii::app()->controller->module->id == 'employees') {
//                echo CHtml::link(Yii::t('app', 'Employees'), array('/employees'), array('class' => 'ic3 active'));
//            } else {
//                echo CHtml::link(Yii::t('app', 'Employees'), array('/employees'), array('class' => 'ic3'));
//            }
        ?>
                </li>
        
        
                <li>
        <?php
//            if (isset(Yii::app()->controller->module->id) and Yii::app()->controller->module->id == 'courses') {
//                echo CHtml::link(Yii::t('app', 'Courses'), array('/courses'), array('class' => 'ic9 active'));
//            } else {
//                echo CHtml::link(Yii::t('app', 'Courses'), array('/courses'), array('class' => 'ic9'));
//            }
        ?>
                    <ul>
                        <li>
        <?php //echo CHtml::link(Yii::t('app', 'Subjects'), array('/courses/subjects'), array('class' => 'ic9'));   ?>
                        </li>
                    </ul>
                </li>
                <li>
        <?php
//            if (isset(Yii::app()->controller->module->id) and Yii::app()->controller->module->id == 'examination') {
//                echo CHtml::link(Yii::t('app', 'Examination'), array('/examination'), array('class' => 'ic12 active'));
//            } else {
//                echo CHtml::link(Yii::t('app', 'Examination'), array('/examination'), array('class' => 'ic12'));
//            }
        ?>
                </li>
                <li>
        <?php
//            if (isset(Yii::app()->controller->module->id) and Yii::app()->controller->module->id == 'attendance') {
//                echo CHtml::link(Yii::t('app', 'Attendance'), array('/attendance'), array('class' => 'ic11 active'));
//            } else {
//                echo CHtml::link(Yii::t('app', 'Attendance'), array('/attendance'), array('class' => 'ic11'));
//            }
        ?>
                </li>
                <li>
        <?php
//            if (isset(Yii::app()->controller->module->id) and Yii::app()->controller->module->id == 'timetable') {
//                echo CHtml::link(Yii::t('app', 'Timetable'), array('/timetable'), array('class' => 'ic14 active'));
//            } else {
//                echo CHtml::link(Yii::t('app', 'Timetable'), array('/timetable'), array('class' => 'ic14'));
//            }
        ?>
                </li>
        
                <li>
        <?php
//            if (isset(Yii::app()->controller->module->id) and Yii::app()->controller->module->id == 'fees') {
//                echo CHtml::link(Yii::t('app', 'Fees'), array('/fees'), array('class' => 'ic13 active'));
//            } else {
//                echo CHtml::link(Yii::t('app', 'Fees'), array('/fees'), array('class' => 'ic13'));
//            }
        ?>
                </li>
        
                <li><?php
//            if (isset(Yii::app()->controller->module->id) and Yii::app()->controller->module->id == 'report') {
//                echo CHtml::link(Yii::t('app', 'Reports'), array('/report'), array('class' => 'ic6 active'));
//            } else {
//                echo CHtml::link(Yii::t('app', 'Reports'), array('/report'), array('class' => 'ic6'));
//            }
        ?>
                </li>
                <li>
        <?php
//            if (Yii::app()->controller->id == 'configurations' or Yii::app()->controller->id == 'subjects' or Yii::app()->controller->id == 'subjectName' or Yii::app()->controller->id == 'user' or in_array(Yii::app()->controller->id, array('admin', 'profile', 'profileField')) or Yii::app()->controller->id == 'edit') {
//                echo CHtml::link(Yii::t('app', 'Settings'), array('/configurations/'), array('class' => 'ic8 active'));
//            } else {
//                echo CHtml::link(Yii::t('app', 'Settings'), array('/configurations/'), array('class' => 'ic8'));
//            }
        ?>
                </li>  
                <li>
        <?php
//            if (Yii::app()->controller->id == 'configurations' or Yii::app()->controller->id == 'subjects' or Yii::app()->controller->id == 'subjectName' or Yii::app()->controller->id == 'user' or in_array(Yii::app()->controller->id, array('admin', 'profile', 'profileField')) or Yii::app()->controller->id == 'edit') {
//                echo CHtml::link(Yii::t('app', 'Rights'), array('/rights/'), array('class' => 'ic8 active'));
//            } else {
//                echo CHtml::link(Yii::t('app', 'Rights'), array('/rights/'), array('class' => 'ic8'));
//            }
        ?>
                </li>      -->
    </ul>
</section>
<!-- /.sidebar -->
