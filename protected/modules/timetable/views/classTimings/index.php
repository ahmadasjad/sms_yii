<?php
/* @var $this ClassTimingsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Class Timings',
);

$this->menu=array(
	array('label'=>'Create ClassTimings', 'url'=>array('create')),
	array('label'=>'Manage ClassTimings', 'url'=>array('admin')),
);
?>

<h1>Class Timings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
