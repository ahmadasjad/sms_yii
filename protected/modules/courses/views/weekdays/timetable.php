<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/promotions.css" />
<?php
$this->breadcrumbs = array(
    'Weekdays' => array('index'),
    'TimeTable',
);
?>
<div style="background:#FFF;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>

            <td valign="top">
                <div style="padding:20px;">



                    <div class="clear"></div>
                    <div class="emp_right_contner">
                        <div class="emp_tabwrapper">
                            <?php $this->renderPartial('/batches/tab'); ?>

                            <div class="clear"></div>
                            <div class="emp_cntntbx" style="padding-top:10px;">
                                <div class="c_subbutCon" align="right" style="width:100%">
                                    <div class="edit_bttns" style="width:280px; top:7px; right:-15px;">
                                        <ul>
                                            <li>
                                            </li>
                                        </ul>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div style="position:absolute; top:13px; left:0px; width:240px; height:35px;">

                                </div>
                                <div  style="width:100%">

                                    
                                    

                                </div>

                            </div>
                        </div>

                    </div>
                </div>



            </td>
        </tr>
    </table>
