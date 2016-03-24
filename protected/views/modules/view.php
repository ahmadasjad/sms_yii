<?php
/* @var $this ModulesController */
/* @var $model Modules */

$this->breadcrumbs=array(
	'Modules'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Modules', 'url'=>array('index')),
	array('label'=>'Create Modules', 'url'=>array('create')),
	array('label'=>'Update Modules', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Modules', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Modules', 'url'=>array('admin')),
);
?>

<h1>View Modules #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'module_name',
		'module_url',
	),
)); ?>
