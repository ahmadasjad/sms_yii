<?php
$this->breadcrumbs = array(
    'Guardians' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);
?>
<div class="row">
    <div class="col-md-3 col-sm-3">
        <?php $this->renderPartial('/default/left_side'); ?>
    </div>
    <div class="col-md-9 col-sm-9">
        <div class="box box-info ">
            <div class="box-header"><h3 class="box-title">Update Guardian <?php echo $model->first_name; ?></h3></div>
            <div class="box-body nav-tabs-custom">
                <div class="cont_right formWrapper">
                    
                    <div class="captionWrapper">
                        <ul class="nav nav-tabs">
                            <li><a href="javascript:void(0);">Student Details</a></li>
                            <li class="active"><a href="javascript:void(0);">Parent Details</a></li>
                            <li><a href="javascript:void(0);">Emergency Contact</a></li>
                            <li><a href="javascript:void(0);">Previous Details</a></li>
                            <li class="last"><a href="javascript:void(0);">Student Profile</a></li>
                        </ul>                        
                    </div>
                    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
                </div>
            </div>            
        </div>
    </div>
</div>
