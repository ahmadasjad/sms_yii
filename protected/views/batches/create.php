<?php
$this->breadcrumbs=array(
	'Batches'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Batches', 'url'=>array('index')),
	array('label'=>'Manage Batches', 'url'=>array('admin')),
);
?>

<h1>Create Batches</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>