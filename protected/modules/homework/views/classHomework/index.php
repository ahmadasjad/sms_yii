<?php
/* @var $this ClassHomeworkController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Class Homeworks',
);

$this->menu = array(
    array('label' => 'Create ClassHomework', 'url' => array('create')),
    array('label' => 'Manage ClassHomework', 'url' => array('admin')),
);
?>

<div class="row">
    <div class="col-md-3 col-sm-3">
        
    </div>
    <div class="col-md-9 col-sm-9">
        <div class="box box-info ">
            <div class="box-header"><h3 class="box-title">Class Homeworks</h3></div>
            <div class="box-body nav-tabs-custom">
                <?php
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider' => $dataProvider,
                    'itemView' => '_view',
                ));
                ?>
            </div>            
        </div>
    </div>
</div>