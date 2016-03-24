<?php
$this->breadcrumbs = array(
    'Messages' => array('/message'),
);
?>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="box box-info ">
            <div class="box-body nav-tabs-custom">
                <div class="row">
                    <div class="col-md-12">
                        <div style="padding:6px 0px;">
                            <?php $form = $this->beginWidget('CActiveForm'); ?>
                            <table width="26%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td><input type="checkbox" name="dontshow" id="checkbox" />
                                        <label for="checkbox"></label></td>
                                    <td style="font-size:11px; color:#999"><strong>Don't show this messages again.</strong></td>
                                    <td><input name="hide" type="submit" class="wel_subbut"  value="Hide" /></td>
                                </tr>
                            </table>
                            <?php $this->endWidget(); ?>
                        </div>
                    </div>                    
                </div>
                <div class="row">

                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Add New Course & Batch</h3>
                            </div>
                            <div class="box-body">
                                <p>After Creating your School Courses and Batches, You will be able to create attendance, Generate Timetable, Create Exams and Collect Fees.<br/>
                                    <?php echo CHtml::link('Create New Course & Batch', array('/courses/courses/create')) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Create New Students</h3>
                            </div>
                            <div class="box-body">
                                <p>Before Creating Students, make sure you created Student Categories and the Cources & Batches for enrolling Students.<br/>
                                    <?php echo CHtml::link('Create New Student', array('/students/students/create')) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Create New Employee</h3>
                            </div>
                            <div class="box-body">
                                <p>Before Creating Employees, make sure you created Employee Categories, Employee Departments
                                    and Employee Positions.<br/>
                                    <?php echo CHtml::link('Create New Employee', array('/employees/employees/create')) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Roles and Permissions</h3>
                            </div>
                            <div class="box-body">
                                <p>By using roles and, you have the ability to control who has access your Open-School installation.<br/>
                                    <?php echo CHtml::link('User Management', array('/user/admin')) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Configurations</h3>
                            </div>
                            <div class="box-body">
                                <p>Make sure you completed your school configurations like School name, Logo and School Timings. 
                                    <br/><?php echo CHtml::link('Application Configurations', array('/configurations/create')) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>            
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