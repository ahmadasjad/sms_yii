<ul class="nav nav-tabs">
    <li class="<?php echo Yii::app()->controller->action->id == 'view'?'active':''; ?>"> 

        <?php
//        if (Yii::app()->controller->action->id == 'view') {
//            echo CHtml::link(Yii::t('students', 'Profile'), array('view', 'id' => $_REQUEST['id']), array('class' => 'active'));
//        } else {
//            echo CHtml::link(Yii::t('students', 'Profile'), array('view', 'id' => $_REQUEST['id']));
//        }
        echo CHtml::link(Yii::t('students', 'Profile'), array('view', 'id' => $_REQUEST['id']));
        ?>
    </li>



    <li class="<?php echo Yii::app()->controller->action->id == 'assesments'?'active':''; ?>"> 

        <?php
//        if (Yii::app()->controller->action->id == 'assesments') {
//            echo CHtml::link(Yii::t('students', 'Assessments'), array('assesments', 'id' => $_REQUEST['id']), array('class' => 'active'));
//        } else {
//            echo CHtml::link(Yii::t('students', 'Assessments'), array('assesments', 'id' => $_REQUEST['id']));
//        }
        echo CHtml::link(Yii::t('students', 'Assessments'), array('assesments', 'id' => $_REQUEST['id']));
        ?>
    </li>

    <li class="<?php echo Yii::app()->controller->action->id == 'attentance'?'active':''; ?>"> 

        <?php
//        if (Yii::app()->controller->action->id == 'attentance') {
//            echo CHtml::link(Yii::t('students', 'Attendance'), array('attentance', 'id' => $_REQUEST['id']), array('class' => 'active'));
//        } else {
//            echo CHtml::link(Yii::t('students', 'Attendance'), array('attentance', 'id' => $_REQUEST['id']));
//        }
        echo CHtml::link(Yii::t('students', 'Attendance'), array('attentance', 'id' => $_REQUEST['id']));
        ?>
    </li>

    <li class="<?php echo Yii::app()->controller->action->id == 'fees'?'active':''; ?>"> 

        <?php
//        if (Yii::app()->controller->action->id == 'fees') {
//            echo CHtml::link(Yii::t('students', 'Fees'), array('fees', 'id' => $_REQUEST['id']), array('class' => 'active'));
//        } else {
//            echo CHtml::link(Yii::t('students', 'Fees'), array('fees', 'id' => $_REQUEST['id']));
//        }
        echo CHtml::link(Yii::t('students', 'Fees'), array('fees', 'id' => $_REQUEST['id']));
        ?>
    </li>
    <?php /* ?><li><a href="#">Additional Notes</a></li><?php */ ?>
</ul>
