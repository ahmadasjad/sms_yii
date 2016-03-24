<?php
/* @var $this ActionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Actions',
);

$this->menu=array(
	array('label'=>'Create Actions', 'url'=>array('create')),
	array('label'=>'Manage Actions', 'url'=>array('admin')),
);
?>

<h1>Actions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
