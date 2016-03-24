<?php
/* @var $this ClassHomeworkController */
/* @var $model ClassHomework */

$this->breadcrumbs=array(
	'Class Homeworks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClassHomework', 'url'=>array('index')),
	array('label'=>'Manage ClassHomework', 'url'=>array('admin')),
);
?>

<h1>Create ClassHomework</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>