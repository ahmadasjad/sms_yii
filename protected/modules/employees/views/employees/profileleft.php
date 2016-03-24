<!-- Profile Image -->
<div class="box box-primary">
    <div class="box-body box-profile">        
        <?php
        $employee = Employees::model()->findByAttributes(array('id' => $_REQUEST['id']));
        if ($employee->photo_file_name) {
            $employee_img_src = $this->createUrl('DisplaySavedImage&id=' . $employee->primaryKey);
        } elseif ($employee->gender == 'M') {
            $employee_img_src = 'images/s_prof_m_image.png';
        } elseif ($employee->gender == 'F') {
            $employee_img_src = 'images/s_prof_fe_image.png';
        }
        ?>
        <img class="profile-user-img img-responsive img-circle" src="<?php echo $employee_img_src; ?>" alt="<?php echo $employee->first_name; ?>">
        <h3 class="profile-username text-center"><?php echo $employee->first_name . ' ' . $employee->last_name; ?></h3>
        <!--<p class="text-muted text-center"><?php echo $employee->email; ?></p>-->  

        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>Email</b> <a class="pull-right"><?php echo $employee->email; ?></a>
            </li>
        </ul>
        <?php
        if ($_SESSION['profile']['user_type'] != 'employee') {
            ?>
            <?php echo CHtml::link(Yii::t('employees', '<span>Edit</span>'), array('update', 'id' => $_REQUEST['id']), array('class' => ' btn btn-primary ')); ?>
            <?php echo CHtml::link(Yii::t('employees', '<span>Employees</span>'), array('employees/manage'), array('class' => 'btn btn-primary pull-right')); ?>
            <?php
        }
        ?>
    </div>
</div>
