<?php
$this->breadcrumbs = array(
    'Configurations' => array('index'),
    'Create',
);
?>

<div class="row">
    <div class="col-md-3 col-sm-3">
        <?php $this->renderPartial('//configurations/left_side'); ?>
    </div>
    <div class="col-md-9 col-sm-9">
        <div class="box box-info ">
            <div class="box-header"><h3 class="box-title">School Configurations</h3></div>
            <div class="box-body nav-tabs-custom">
                <div class="cont_right formWrapper">                
                    <?php
                    Yii::app()->clientScript->registerScript(
                            'myHideEffect', '$(".test").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
                    );
                    ?>
                    <?php
                    if (Yii::app()->user->hasFlash('errorMessage')):
                        ?>
                        <div class="test" style="background:#FFF; color:#C00; padding-left:200px; font-size:16px">
                            <?php echo Yii::app()->user->getFlash('errorMessage'); ?>
                        </div>
                        <?php
                    endif;
                    ?>
                    <?php echo $this->renderPartial('_form', array('model' => $model, 'logo' => $logo)); ?>
                </div>
            </div>            
        </div>
    </div>
</div>

