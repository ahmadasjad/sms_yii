<?php
$this->breadcrumbs = array(
    $this->module->id,
);
?>
<?php if ($list != NULL) {
    ?>
    <?php
    $currdate = date('d-m-Y');

    $one = date("m");
    $one_1 = date("M");

    $two = date("m d y", strtotime("-1 months", strtotime($currdate)));
    $two_1 = date("M", strtotime("-1 months", strtotime($currdate)));

    $three = date("m", strtotime("-2 months", strtotime($currdate)));
    $three_1 = date("M", strtotime("-2 months", strtotime($currdate)));

    $four = date("m", strtotime("-3 months", strtotime($currdate)));
    $four_1 = date("M", strtotime("-3 months", strtotime($currdate)));

    $five = date("m", strtotime("-4 months", strtotime($currdate)));
    $five_1 = date("M", strtotime("-4 months", strtotime($currdate)));

    $six = date("m", strtotime("-5 months", strtotime($currdate)));
    $six_1 = date("M", strtotime("-5 months", strtotime($currdate)));

    $seven = date("m", strtotime("-6 months", strtotime($currdate)));
    $seven_1 = date("M", strtotime("-6 months", strtotime($currdate)));

    $eight = date("m", strtotime("-7 months", strtotime($currdate)));
    $eight_1 = date("M", strtotime("-7 months", strtotime($currdate)));

    $nine = date("m", strtotime("-8 months", strtotime($currdate)));
    $nine_1 = date("M", strtotime("-8 months", strtotime($currdate)));

    $ten = date("m", strtotime("-9 months", strtotime($currdate)));
    $ten_1 = date("M", strtotime("-9 months", strtotime($currdate)));

    $eleven = date("m", strtotime("-10 months", strtotime($currdate)));
    $eleven_1 = date("M", strtotime("-10 months", strtotime($currdate)));

    $twelve = date("m", strtotime("-11 months", strtotime($currdate)));
    $twelve_1 = date("M", strtotime("-11 months", strtotime($currdate)));

    $data_1 = Students::model()->findAll('month(created_at)=:id AND is_deleted=:status', array(':id' => $one, ':status' => '0'));
    $data_2 = Students::model()->findAll('month(created_at)=:id AND is_deleted=:status', array(':id' => $two, ':status' => '0'));
    $data_3 = Students::model()->findAll('month(created_at)=:id AND is_deleted=:status', array(':id' => $three, ':status' => '0'));
    $data_4 = Students::model()->findAll('month(created_at)=:id AND is_deleted=:status', array(':id' => $four, ':status' => '0'));
    $data_5 = Students::model()->findAll('month(created_at)=:id AND is_deleted=:status', array(':id' => $five, ':status' => '0'));
    $data_6 = Students::model()->findAll('month(created_at)=:id AND is_deleted=:status', array(':id' => $six, ':status' => '0'));
    $data_7 = Students::model()->findAll('month(created_at)=:id AND is_deleted=:status', array(':id' => $seven, ':status' => '0'));
    $data_8 = Students::model()->findAll('month(created_at)=:id AND is_deleted=:status', array(':id' => $eight, ':status' => '0'));
    $data_9 = Students::model()->findAll('month(created_at)=:id AND is_deleted=:status', array(':id' => $nine, ':status' => '0'));
    $data_10 = Students::model()->findAll('month(created_at)=:id AND is_deleted=:status', array(':id' => $ten, ':status' => '0'));
    $data_11 = Students::model()->findAll('month(created_at)=:id AND is_deleted=:status', array(':id' => $eleven, ':status' => '0'));
    $data_12 = Students::model()->findAll('month(created_at)=:id AND is_deleted=:status', array(':id' => $twelve, ':status' => '0'));

    $month = '["' . $one_1 . '","' . $two_1 . '","' . $three_1 . '","' . $four_1 . '","' . $five_1 . '","' . $six_1 . '","' . $seven_1 . '","' . $eight_1 . '","' . $nine_1 . '","' . $ten_1 . '","' . $eleven_1 . '","' . $twelve_1 . '",]';
    $data = "[" . count($data_1) . "," . count($data_2) . "," . count($data_3) . "," . count($data_4) . "," . count($data_5) . "," . count($data_6) . "," . count($data_7) . "," . count($data_8) . "," . count($data_9) . "," . count($data_10) . "," . count($data_11) . "," . count($data_12) . ",]";
    ?>
<!--    <script type="text/javascript">
        var chart;
        $(document).ready(function () {
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'container',
                    type: 'column'
                },
                title: {
                    text: 'Monthly Average Admissions'
                },
                subtitle: {
                    /*text: 'Cource: Computer Applications'*/
                },
                xAxis: {
                    categories:
    <?php echo $month; ?>

                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'No.of Admissions'
                    }
                },
                credits: {
                    enabled: false
                },
                legend: {
                    layout: 'none',
                },
                tooltip: {
                    formatter: function () {
                        return '' +
                                this.x + ': ' + this.y + ' Admissions';
                    }
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                        name: 'Month',
                        data: <?php echo $data; ?>,
                        color: '#adce5c',
                    }, ]
            });
        });
    </script>-->


    <div class="row">
        <div class="col-md-3 col-sm-3">
            <?php $this->renderPartial('/default/left_side'); ?>
        </div>
        <div class="col-md-9 col-sm-9">
            <div class="box box-info ">
                <div class="box-header"><h3 class="box-title"><?php echo Yii::t('students', 'Admissions Dashboard'); ?></h3></div>
                <div class="box-body nav-tabs-custom">
                    <div class="row">                        
                        <div class="col-lg-4 col-sm-6 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <?php $tot = Students::model()->countByAttributes(array('is_active' => 1, 'is_deleted' => 0)); ?>
                                    <h3><?php echo $tot ?><sup style="font-size: 20px"></sup></h3>                                    
                                    <p><?php echo Yii::t('students', '<strong>Total Students</strong>'); ?></p>
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
                                    <?php $students = Students::model()->findAll('is_active=:x group by id', array(':x' => '0')); ?>
                                    <h3><?php echo count($students); ?></h3>
                                    <p><?php echo Yii::t('students', '<strong>Inactive Students</strong>'); ?></p>
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
                                    <h3><?php echo count($list) ?></h3>
                                    <p><?php echo Yii::t('students', '<strong>New Admissions</strong>'); ?></p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div><!-- ./col -->
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div style="margin-top:20px; width:90%" id="container"></div>
                            <div style="font-size:13px; padding:5px 0px"><?php echo Yii::t('students', '<strong>Recent Admissions</strong>'); ?></div>
                            <table class="table table-striped table-responsive">
                                <tbody>
                                    <tr>
                                        <td align="center" height="18"><?php echo Yii::t('students', 'Date'); ?></td>
                                        <td align="center"><?php echo Yii::t('students', 'Student Name'); ?></td>
                                        <td align="center"><?php echo Yii::t('students', 'Admission No.'); ?></td>
                                        <td align="center"><?php echo Yii::t('students', 'Course/Batch'); ?></td>
                                        <td align="center"><?php echo Yii::t('students', 'Gender'); ?></td>

                                    </tr>
                                </tbody>
                                <?php foreach ($list as $list_1) {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td align="center"><?php
                                                $settings = UserSettings::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
                                                if ($settings != NULL) {
                                                    $date1 = date($settings->displaydate, strtotime($list_1->admission_date));
                                                    echo $date1;
                                                } else
                                                    echo $list_1->admission_date;
                                                ?>&nbsp;</td>
                                            <td align="center"><?php echo CHtml::link($list_1->first_name . '  ' . $list_1->middle_name . '  ' . $list_1->last_name, array('view', 'id' => $list_1->id)) ?>&nbsp;</td>
                                            <td align="center"><?php echo $list_1->admission_no ?></td>
                                            <td align="center">
                                                <?php
                                                $batc = Batches::model()->findByAttributes(array('id' => $list_1->batch_id));
                                                if ($batc != NULL) {
                                                    $cours = Courses::model()->findByAttributes(array('id' => $batc->course_id));
                                                    ?>
                                                    <?php echo $cours->course_name . ' / ' . $batc->name; ?> 
                                                <?php } else {
                                                    ?> - <?php } ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($list_1->gender == 'M') {
                                                    echo 'Male';
                                                } elseif ($list_1->gender == 'F') {
                                                    echo 'Female';
                                                }
                                                ?>
                                            </td>

                                        </tr>

                                    </tbody>
                                <?php }
                                ?>
                            </table>
                        </div>
                    </div>

                </div>            
            </div>
        </div>
    </div>


    <?php
} else {
    ?>
    <div class="row">
        <div class="col-md-3 col-sm-3">
            <?php $this->renderPartial('/default/left_side'); ?>
        </div>
        <div class="col-md-9 col-sm-9">
            <div class="box box-info ">
                <!--<div class="box-header"><?php echo Yii::t('students', 'New Admission'); ?></div>-->
                <div class="box-body nav-tabs-custom">
                    <div class="y_bx_head" style="width:650px;">
                        It appears that this is the first time that you are using this Open-School Setup. For any new installation we recommend that you configure the following:
                    </div>
                    <div class="y_bx_list" style="width:650px;">
                        <h1><?php echo CHtml::link(Yii::t('students', 'Create New Students'), array('create')) ?></h1>
                        <p>Before Creating Students, make sure you created <?php echo CHtml::link(Yii::t('students', 'Student Categories'), array('/students/studentCategory')) ?> and the <?php echo CHtml::link('Courses &amp; Batches', array('/courses/courses/create')) ?> for enrolling Students.</p>
                    </div>
                </div>            
            </div>
        </div>
    </div>



<?php } ?>