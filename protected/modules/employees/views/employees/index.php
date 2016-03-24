<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
<?php
$this->breadcrumbs = array(
    $this->module->id,
);
?>
<?php if ($list != NULL) { ?>
    <?php
//$sub = Employees::model()->findAll("is_deleted=:x", array(':x'=>0));

    $data = '';

    $empy = EmployeeDepartments::model()->findAll();
    foreach ($empy as $empy_1) {
        $emp_number = Employees::model()->findAll("employee_department_id=:x", array(':x' => $empy_1->id));
        $data .='{name:"' . $empy_1->name . '",
			y:' . count($emp_number) . ',
			sliced: true,
			selected: true,},';
    }



    ?>
<!--    <script type="text/javascript">
        var chart;
        $(document).ready(function () {
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'container',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'Employee Strength'
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.point.name + '</b>: ' + Math.round(this.percentage * 100) / 100 + ' %';
                    }
                },
                credits: {
                    enabled: false
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        borderWidth: 0,
                        shadow: 0,
                        dataLabels: {
                            enabled: true,
                            color: '#969698',
                            connectorColor: '#d8d8d8',
                            formatter: function () {
                                return '<b>' + this.point.name + '</b>: ' + Math.round(this.percentage * 100) / 100 + ' %';
                            }
                        }
                    }
                },
                series: [{
                        type: 'pie',
                        name: 'Employee Strenght',
                        data: [
    <?php echo $data; ?>
                        ]
                    }]
            });
        });
    </script>-->
    <div class="row">
        <div class="col-md-3 col-sm-3">
            <?php $this->renderPartial('/employees/left_side'); ?>
        </div>
        <div class="col-md-9 col-sm-9">
            <div class="box box-info ">
                <!--<div class="box-header"><?php echo Yii::t('employees', 'Employees Dashboard'); ?></div>-->
                <div class="box-body nav-tabs-custom">
                    <div class="row">                        
                        <div class="col-lg-4 col-sm-6 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <?php $tot = Students::model()->countByAttributes(array('is_active' => 1, 'is_deleted' => 0)); ?>
                                    <h3><?php echo $total ?><sup style="font-size: 20px"></sup></h3>                                    
                                    <p><?php echo Yii::t('employees', '<strong>Total Employees</strong>'); ?></p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>      
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-4 col-sm-6 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?php echo count($list) ?></h3>
                                    <p><?php echo Yii::t('employees', '<strong>New Admissions</strong>'); ?></p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>

                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-4 col-sm-6 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>0</h3>
                                    <p><?php echo Yii::t('employees', '<strong>Inactive Users</strong>'); ?></p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div><!-- ./col -->
                    </div>
                    <div style="font-size:13px; padding:5px 0px"><?php echo Yii::t('employees', '<strong>Recent Employee Admissions</strong>'); ?></div>
                    <table class="table table-condensed">
                        <tr>
                            <th align="center" height="18"><?php echo Yii::t('employees', 'Date'); ?></th>
                            <th align="center"><?php echo Yii::t('employees', 'Employee Name'); ?></th>
                            <th align="center"><?php echo Yii::t('employees', 'Employee No:'); ?></th>
                            <th align="center"><?php echo Yii::t('employees', 'Department'); ?></th>
                            <th align="center"><?php echo Yii::t('employees', 'Position'); ?></th>
                        </tr>
                        <?php foreach ($list as $list_1) { ?>
                            <tr>
                                <td align="center"><?php
                                    $settings = UserSettings::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
                                    if ($settings != NULL) {
                                        $date1 = date($settings->displaydate, strtotime($list_1->joining_date));
                                        echo $date1;
                                    } else
                                        echo $list_1->joining_date;
                                    ?>&nbsp;
                                </td>
                                <td align="center"><?php echo CHtml::link($list_1->first_name . '  ' . $list_1->middle_name . '  ' . $list_1->last_name, array('view', 'id' => $list_1->id)) ?>&nbsp;</td>
                                <td align="center"><?php echo $list_1->employee_number; ?></td>
                                <?php $dept = EmployeeDepartments::model()->findByAttributes(array('id' => $list_1->employee_department_id)); ?>
                                <td align="center"><?php
                                    if ($dept != NULL) {
                                        echo $dept->name;
                                    } else {
                                        echo '-';
                                    }
                                    ?> 
                                </td>
                                <?php $pos = EmployeePositions::model()->findByAttributes(array('id' => $list_1->employee_position_id)); ?>
                                <td align="center"><?php
                                    if ($pos != NULL) {
                                        echo $pos->name;
                                    } else {
                                        echo '-';
                                    }
                                    ?>
                                </td>

                            </tr>
                        <?php } ?>
                    </table>
                </div>            
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="row">
        <div class="col-md-3 col-sm-3">
            <?php $this->renderPartial('/employees/left_side'); ?>
        </div>
        <div class="col-md-9 col-sm-9">
            <div class="box box-info ">
                <div class="box-header"><h3 class="box-title">Create New Employee</h3></div>
                <div class="box-body nav-tabs-custom">
                    <?php echo CHtml::link(Yii::t('employees', 'Create New Employee'), array('create'), array('class' => 'btn btn-primary btn-sm')) ?>
                    <div class="y_bx_list" style="width:650px;">
                        <p>Before Creating Employees, make sure you created <br/>
                            <?php echo CHtml::link(Yii::t('employees', 'Employee Categories'), array('employeeCategories/create')) ?>
                            <br/> <?php echo CHtml::link('Employee Departments', array('employeeDepartments/create')) ?>
                            <br/> <?php echo CHtml::link('Employee Positions', array('employeePositions/create')) ?>
                        </p>
                    </div>
                </div>            
            </div>
        </div>
    </div>

<?php } ?>
