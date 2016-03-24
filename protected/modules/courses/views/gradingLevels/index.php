<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/promotions.css" />
<?php
$this->breadcrumbs = array(
    'Exam' => array('/courses'),
    $model->name,
);
?>

<div style="background:#FFF; min-height:600px;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>

            <td valign="top">
                <div style="padding:20px;">    

                    <div class="clear"></div>
                    <div class="emp_right_contner">
                        <div class="emp_tabwrapper">
                            <?php $this->renderPartial('/batches/tab'); ?>

                            <div class="clear"></div>
                            
                        </div></div>
                </div></td></tr></table>
</div>
