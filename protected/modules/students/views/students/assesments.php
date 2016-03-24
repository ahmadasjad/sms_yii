<?php
$this->breadcrumbs = array(
    'Students' => array('index'),
    'Assessments',
);
?>
<div class="row">
    <div class="col-md-3">
        <?php
        $this->renderPartial('profileleft', array(
            'model' => $model,
        ));
        ?>
    </div><!-- /.col -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <?php $this->renderPartial('tab'); ?>
            <div class="tab-content">
                <?php
                $exam = ExamScores::model()->findAll("student_id=:x", array(':x' => $_REQUEST['id']));
                ?>
                <table class="table">
                    <tr>
                        <th><?php echo Yii::t('students', 'Exam Group Name'); ?></th>
                        <th><?php echo Yii::t('students', 'Subject'); ?></th>
                        <th><?php echo Yii::t('students', 'Marks'); ?></th>
                        <th><?php echo Yii::t('students', 'Result'); ?></th>
                    </tr>

                    <?php
                    if ($exam != NULL) {
                        foreach ($exam as $exams) {
                            echo '<tr>';
                            $exm = Exams::model()->findByAttributes(array('id' => $exams->exam_id));
                            $group = ExamGroups::model()->findByAttributes(array('id' => $exm->exam_group_id));
                            echo '<td>' . $group->name . '</td>';
                            $sub = Subjects::model()->findByAttributes(array('id' => $exm->subject_id));
                            echo '<td>' . $sub->name . '</td>';
                            echo '<td>' . $exams->marks . '</td>';
                            if ($exams->is_failed == NULL)
                                echo '<td>Passed</td>';
                            else
                                echo '<td>Failed</td>';
                            echo '</tr>';
                        }
                    }
                    else {
                        echo '<tr>';
                        echo '<td colspan="4"> No Exam Details Available!</td>';
                        echo '<tr>';
                    }
                    ?>    
                </table>
            </div>
        </div>
    </div>
</div>

