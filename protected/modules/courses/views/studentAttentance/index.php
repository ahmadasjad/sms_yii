<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/promotions.css" />
<?php
$this->breadcrumbs = array(
    'Attendances',
);
?>
<?php $batch = Batches::model()->findByAttributes(array('id' => $_REQUEST['id'])); ?>
<div style="background:#fff; min-height:800px;">        

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody><tr>

                <td valign="top">
                    <?php
                    if ($batch != NULL) {
                        ?>
                        <div style="padding:20px;">
                            <div class="clear"></div>
                            <div class="emp_right_contner">
                                <div class="emp_tabwrapper">
                                    <?php $this->renderPartial('/batches/tab'); ?>

                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </td>
            </tr>
    </table>
</div>