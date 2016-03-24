<!-- Profile Image -->
<div class="box box-primary">
    <div class="box-body box-profile">
        <?php
        $student = Students::model()->findByAttributes(array('id' => $_REQUEST['id']));
        if ($student->photo_file_name) {
            $student_img_src = $this->createUrl('DisplaySavedImage&id=' . $student->primaryKey);
        } elseif ($student->gender == 'M') {
            $student_img_src = 'images/s_prof_m_image.png';
        } elseif ($student->gender == 'F') {
            $student_img_src = 'images/s_prof_fe_image.png';
        }
        ?>
        <img class="profile-user-img img-responsive img-circle" src="<?php echo $student_img_src; ?>" alt="<?php echo $student->first_name; ?>">
        <h3 class="profile-username text-center"><?php echo $student->first_name . ' ' . $student->last_name; ?></h3>
        <p class="text-muted text-center"><?php echo $student->email; ?></p>

        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-3"><b><?php echo Yii::t('students', 'Course&nbsp;:'); ?></b> </div>
                    <div class="col-sm-9">
                        <a class="pull-right">
                            <?php
                            $posts = Batches::model()->findByPk($student->batch_id);
                            if ($posts != NULL)
                                echo $posts->course123->course_name
                                ?>
                        </a>
                    </div>
                </div>


            </li>
            <li class="list-group-item">
                <b><?php echo Yii::t('students', 'Batch&nbsp;:'); ?></b> <a class="pull-right"><?php
                    $batch = Batches::model()->findByAttributes(array('id' => $student->batch_id));
                    if ($batch != NULL)
                        echo $batch->name;
                    ?></a>
            </li>
            <li class="list-group-item">
                <b><?php echo Yii::t('students', 'Adm No&nbsp;:'); ?></b> <a class="pull-right"><?php echo $student->admission_no; ?></a>
            </li>
        </ul>
        <?php echo CHtml::link(Yii::t('students', '<span>Edit</span>'), array('update', 'id' => $model->id), array('class' => ' btn btn-primary ')); ?>
        <?php echo CHtml::link(Yii::t('students', '<span>Students</span>'), array('students/manage'), array('class' => 'btn btn-primary pull-right')); ?>
    </div><!-- /.box-body -->
</div><!-- /.box -->
