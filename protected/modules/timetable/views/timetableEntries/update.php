<?php
/* @var $this TimetableEntriesController */
/* @var $model TimetableEntries */

$this->breadcrumbs=array(
	'Timetable Entries'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TimetableEntries', 'url'=>array('index')),
	array('label'=>'Create TimetableEntries', 'url'=>array('create')),
	array('label'=>'View TimetableEntries', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TimetableEntries', 'url'=>array('admin')),
);
?>

<h1>Update TimetableEntries <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>