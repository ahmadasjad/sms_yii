<table class="table table-striped table-bordered">
    <tbody>
        <!--class="cbtablebx_topbg"  class="sub_act"-->
        <tr class="pdtab-h">
            <th align="center"><?php echo Yii::t('Courses', 'Batch Name'); ?></th>
            <th align="center"><?php echo Yii::t('Courses', 'Class Teacher'); ?></th>
            <th align="center"><?php echo Yii::t('Courses', 'Start Date'); ?></th>
            <th align="center"><?php echo Yii::t('Courses', 'End Date'); ?></th>
            <th align="center"><?php echo Yii::t('Courses', 'Actions'); ?></th>
        </tr>
        <?php
        foreach ($batch as $batch_1) {
            echo '<tr id="batchrow' . $batch_1->id . '">';
            echo '<td style="text-align:left; padding-left:10px; font-weight:bold;">' . CHtml::link($batch_1->name, array('batches/batchstudents', 'id' => $batch_1->id)) . '</td>';
            $settings = UserSettings::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
            if ($settings != NULL) {
                $date1 = date($settings->displaydate, strtotime($batch_1->start_date));
                $date2 = date($settings->displaydate, strtotime($batch_1->end_date));
            }
            $teacher = Employees::model()->findByAttributes(array('id' => $batch_1->employee_id));
            echo '<td align="center">';
            if ($teacher) {
                echo $teacher->first_name . ' ' . $teacher->last_name;
            } else {
                echo '-';
            }
            echo '</td>';
            echo '<td align="center">' . $date1 . '</td>';
            echo '<td align="center">' . $date2 . '</td>';
            echo '<td align="center">';
            ?> 
            <?php
            echo CHtml::ajaxLink(Yii::t('Courses', 'Edit'), $this->createUrl('batches/addupdate'), array(
                'onclick' => '$("#jobDialog123").dialog("open"); return false;',
                'update' => '#jobDialog123', 'type' => 'GET', 'data' => array('val1' => $batch_1->id, 'course_id' => $posts_1->id), 'dataType' => 'text'), array('id' => 'showJobDialog12' . $batch_1->id, 'class' => 'add'));
            echo ' | ' . CHtml::ajaxLink(
                    "Delete", $this->createUrl('batches/remove'), array('success' => 'rowdelete(' . $batch_1->id . ')', 'type' => 'GET', 'data' => array('val1' => $batch_1->id), 'dataType' => 'text'), array('confirm' => "Are you sure?\n\n Note: All details (students, timetable, fees, exam) related to this batch will be deleted."));
            ?> <?php
            echo '&nbsp;&nbsp;&nbsp;' . CHtml::link(Yii::t('Courses', 'Add Student'), array('/students/students/create', 'bid' => $batch_1->id)) . '</td>';
            echo '</tr>';
            echo '<div id="jobDialog123"></div>';
        }
        ?>
    </tbody>
</table>