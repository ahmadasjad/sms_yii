<?php
$this->breadcrumbs=array(
	'Batches'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Batches', 'url'=>array('index')),
	array('label'=>'Create Batches', 'url'=>array('create')),
	array('label'=>'View Batches', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Batches', 'url'=>array('admin')),
);
?>

<h1>Update Batches <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>