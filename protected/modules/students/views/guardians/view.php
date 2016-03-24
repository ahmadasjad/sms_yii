<?php
$this->breadcrumbs = array(
    'Guardians' => array('index'),
    $model->id,
);
?>
<div class="row">
    <div class="col-md-3 col-sm-3">
        <?php $this->renderPartial('/default/left_side'); ?>
    </div>
    <div class="col-md-9 col-sm-9">
        <div class="box box-info ">
            <div class="box-header"><h3 class="box-title"><?php echo Yii::t('report', 'Guardian Details'); ?></h3></div>
            <div class="box-body nav-tabs-custom">
                <?php
                $guard = Guardians::model()->findByAttributes(array('id' => $_REQUEST['id']));
                $students = Students::model()->findAllByAttributes(array('parent_id' => $guard->id));
                ?>
                <div class="row">

                    <div class="col-sm-12">
                        <table class="table" >
                            <tr class="pdtab-h">
                                <th style="text-align:center"><?php echo Yii::t('report', 'Name'); ?></th>
                                <th style="text-align:center"><?php echo Yii::t('report', 'Student Name'); ?></th>
                                <th style="text-align:center"><?php echo Yii::t('report', 'Relation'); ?></th>
                                <th style="text-align:center"><?php echo Yii::t('report', 'Email'); ?></th>
                                <th style="text-align:center"><?php echo Yii::t('report', 'Office Phone'); ?></th>
                                <th style="text-align:center"><?php echo Yii::t('report', 'Address'); ?></th>
                            </tr>

                            <tr>
                                <td align="center">
                                    <?php
                                    if ($guard->last_name != NULL or $guard->first_name != NULL)
                                        echo ucfirst($guard->last_name) . ' ' . ucfirst($guard->first_name);
                                    else
                                        echo '-';
                                    ?>
                                </td>
                                <td align="center">
                                    <?php
                                    if ($students != NULL) {
                                        foreach ($students as $student) {
                                            if ($student->first_name != NULL or $student->last_name != NULL)
                                                echo ucfirst($student->first_name) . ' ' . ucfirst($student->last_name) . '<br/>';
                                            else
                                                echo '-';
                                        }
                                    }
                                    else {
                                        echo '-';
                                    }
                                    ?>
                                </td>
                                <td align="center">
                                    <?php
                                    if ($guard->relation != NULL)
                                        echo ucfirst($guard->relation);
                                    else
                                        echo '-';
                                    ?>
                                </td>
                                <td align="center">
                                    <?php
                                    if ($guard->email != NULL)
                                        echo $guard->email;
                                    else
                                        echo '-';
                                    ?>
                                </td>
                                <td align="center">
                                    <?php
                                    if ($guard->office_phone1 != NULL)
                                        echo $guard->office_phone1;
                                    else
                                        echo '-';
                                    ?>
                                </td>
                                <td style="text-align:left; padding-left:5px;">
                                    <?php
                                    if ($guard->office_address_line1 != NULL)
                                        echo ucfirst($guard->office_address_line1) . '<br />';
                                    if ($guard->office_address_line2 != NULL)
                                        echo ucfirst($guard->office_address_line2) . '<br />';
                                    if ($guard->city != NULL)
                                        echo ucfirst($guard->city) . '<br />';
                                    if ($guard->state != NULL)
                                        echo ucfirst($guard->state) . '<br />';
                                    if ($guard->country_id != NULL) {
                                        $country = Countries::model()->findByAttributes(array('id' => $guard->country_id));
                                        echo ucfirst($country->name) . '<br />';
                                    }
                                    if ($guard->office_address_line1 == NULL and $guard->office_address_line2 == NULL and $guard->city == NULL and $guard->state == NULL and $guard->country_id == NULL)
                                        echo '-';
                                    ?>
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>

