<?php
/* @var $this ClassHomeworkController */
/* @var $model ClassHomework */

$this->breadcrumbs=array(
	'Class Homeworks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClassHomework', 'url'=>array('index')),
	array('label'=>'Create ClassHomework', 'url'=>array('create')),
	array('label'=>'View ClassHomework', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClassHomework', 'url'=>array('admin')),
);
?>

<h1>Update ClassHomework <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>