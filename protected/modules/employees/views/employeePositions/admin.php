<?php
$this->breadcrumbs = array(
    'Employee Positions' => array('admin'),
    'Manage',
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('employee-positions-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row">
    <div class="col-md-3 col-sm-3">
        <?php $this->renderPartial('/employees/left_side'); ?>
    </div>
    <div class="col-md-9 col-sm-9">
        <div class="box box-info ">
            <div class="box-header"><h3 class="box-title"><?php echo Yii::t('employees', 'Manage Employee Positions'); ?></h3></div>
            <div class="box-body nav-tabs-custom">
                <?php echo CHtml::link(Yii::t('employees', '<span>Add New Position</span>'), array('create'), array('class' => 'addbttn last btn btn-primary btn-sm')); ?>

                <?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
                <div class="search-form" style="display:none">
                    <?php
                    $this->renderPartial('_search', array(
                        'model' => $model,
                    ));
                    ?>
                </div><!-- search-form -->

                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'employee-positions-grid',
                    'dataProvider' => $model->search(),
                    'filter' => $model,
                    'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/formstyle.css'),
                    'cssFile' => Yii::app()->baseUrl . '/css/formstyle.css',
                    'columns' => array(
                        /* 'id', */
                        'name',
                        array(
                            'name' => 'employee_category_id',
                            'value' => array($model, 'categoryname')
                        ),
                        /* 'status', */
                        array(
                            'class' => 'CButtonColumn',
                            'template' => '{update}{delete}',
                        ),
                    ),
                ));
                ?>
            </div>            
        </div>
    </div>
</div>
