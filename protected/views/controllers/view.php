<?php
/* @var $this ControllersController */
/* @var $model Controllers */

$this->breadcrumbs=array(
	'Controllers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Controllers', 'url'=>array('index')),
	array('label'=>'Create Controllers', 'url'=>array('create')),
	array('label'=>'Update Controllers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Controllers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Controllers', 'url'=>array('admin')),
);
?>

<h1>View Controllers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'controller_nam',
		'controller_url',
		'module_id',
	),
)); ?>
