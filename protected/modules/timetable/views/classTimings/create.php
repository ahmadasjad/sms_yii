<?php
/* @var $this ClassTimingsController */
/* @var $model ClassTimings */

$this->breadcrumbs=array(
	'Class Timings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClassTimings', 'url'=>array('index')),
	array('label'=>'Manage ClassTimings', 'url'=>array('admin')),
);
?>

<h1>Create ClassTimings</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>