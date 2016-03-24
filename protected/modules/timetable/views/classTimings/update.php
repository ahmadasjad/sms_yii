<?php
/* @var $this ClassTimingsController */
/* @var $model ClassTimings */

$this->breadcrumbs=array(
	'Class Timings'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClassTimings', 'url'=>array('index')),
	array('label'=>'Create ClassTimings', 'url'=>array('create')),
	array('label'=>'View ClassTimings', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClassTimings', 'url'=>array('admin')),
);
?>

<h1>Update ClassTimings <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>