<div id="othleft-sidebar">
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo Yii::t('employees', 'Manage Employee'); ?></h3>
            <div class="box-tools">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body no-padding">
            <?php

            function t($message, $category = 'cms', $params = array(), $source = null, $language = null) {
                return $message;
            }

            $this->widget('zii.widgets.CMenu', array(
                'encodeLabel' => false,
                'activateItems' => true,
                'activeCssClass' => 'active',
                'htmlOptions' => array('class' => 'nav nav-pills nav-stacked'),
                'items' => array(
                    array('label' => '' . Yii::t('employees', 'List Employees') . '<br/><span class="text-muted small">' . Yii::t('employees', 'All Employee Details') . '</span>', 'url' => array('employees/manage'), 'linkOptions' => array('class' => 'lbook_ico'),
                        'active' => (Yii::app()->controller->action->id == 'manage')
                    ),
                    array('label' => '' . Yii::t('employees', 'Create Employee') . '<br/><span class="text-muted small">' . Yii::t('employees', 'Add New Employee Details') . '</span>', 'url' => array('employees/create'), 'linkOptions' => array('class' => 'sl_ico'), 'active' => (Yii::app()->controller->id == 'employees' and ( Yii::app()->controller->action->id == 'create' or Yii::app()->controller->action->id == 'create2')), 'itemOptions' => array('id' => 'menu_1')
                    ),
                    //array('label' => '' . '<strong>' . Yii::t('employees', 'Employee Leave Management') . '</strong>', 'url' => ''),
                    //array('label' => Yii::t('employees', 'Add Leave Type') . '<br/><span class="text-muted small">' . Yii::t('employees', 'Manage Leave Type') . '</span>', 'url' => array('/employees/employeeLeaveTypes'), 'linkOptions' => array('class' => 'abook_ico'), 'active' => (Yii::app()->controller->id == 'employeeLeaveTypes')),
                    //array('label' => '' . '<strong>' . Yii::t('employees', 'Attendance Management') . '</strong>', 'url' => ''),
                    //array('label' => Yii::t('employees', 'Attendance Register') . '<br/><span class="text-muted small">' . Yii::t('employees', 'Manage Employee Attendance') . '</span>', 'url' => array('/employees/employeeAttendances'), 'active' => (Yii::app()->controller->id == 'employeeAttendances' ? true : false), 'linkOptions' => array('class' => 'ar_ico')),
                    array('label' => '' . '<strong>' . Yii::t('employees', 'Employee Settings') . '</strong>', 'url' => ''),
                    array('label' => Yii::t('employees', 'Subject Association' . '<br/><span class="text-muted small">' . 'Associate All Subjects') . '</span>', 'url' => array('employeesSubjects/create'), 'active' => (Yii::app()->controller->id == 'employeesSubjects' ? true : false), 'linkOptions' => array('class' => 'sa_ico')),
                    array('label' => Yii::t('employees', 'Manage Category') . '<br/><span class="text-muted small">' . Yii::t('employees', 'All Employee Categories') . '</span>', 'url' => array('employeeCategories/admin'), 'active' => (Yii::app()->controller->id == 'employeeCategories' ? true : false), 'linkOptions' => array('class' => 'sm_ico')),
                    array('label' => Yii::t('employees', 'Manage Department') . '<br/><span class="text-muted small">' . Yii::t('employees', 'All Employee Departments') . '</span>', 'url' => array('employeeDepartments/admin'), 'active' => (Yii::app()->controller->id == 'employeeDepartments' ? true : false), 'linkOptions' => array('class' => 'md_ico')),
                    array('label' => Yii::t('employees', 'Manage Positions') . '<br/><span class="text-muted small">' . Yii::t('employees', 'Employee Employee Positions') . '</span>', 'url' => array('employeePositions/admin'), 'active' => (Yii::app()->controller->id == 'employeePositions' ? true : false), 'linkOptions' => array('class' => 'mp_ico')),
                    array('label' => Yii::t('employees', 'Manage Grades') . '<br/><span class="text-muted small">' . Yii::t('employees', 'All Employee Grades') . '</span>', 'url' => array('employeeGrades/admin'), 'active' => (Yii::app()->controller->id == 'employeeGrades' ? true : false), 'linkOptions' => array('class' => 'mg_ico')),
                ),
            ));
            ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        //Hide the second level menu
        $('#othleft-sidebar ul li ul').hide();
        //Show the second level menu if an item inside it active
        $('li.list_active').parent("ul").show();

        $('#othleft-sidebar').children('ul').children('li').children('a').click(function () {
            if ($(this).parent().children('ul').length > 0) {
                $(this).parent().children('ul').toggle();
            }
        });
    });
</script>