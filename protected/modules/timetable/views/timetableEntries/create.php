<?php
/* @var $this TimetableEntriesController */
/* @var $model TimetableEntries */

$this->breadcrumbs=array(
	'Timetable Entries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TimetableEntries', 'url'=>array('index')),
	array('label'=>'Manage TimetableEntries', 'url'=>array('admin')),
);
?>

<h1>Create TimetableEntries</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>