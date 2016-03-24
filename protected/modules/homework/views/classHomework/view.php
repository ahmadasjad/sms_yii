<?php
/* @var $this ClassHomeworkController */
/* @var $model ClassHomework */

$this->breadcrumbs = array(
    'Class Homeworks' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List ClassHomework', 'url' => array('index')),
    array('label' => 'Create ClassHomework', 'url' => array('create')),
    array('label' => 'Update ClassHomework', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete ClassHomework', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage ClassHomework', 'url' => array('admin')),
);
?>

<h1>View ClassHomework #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'batch_id',
        'employee_id',
        'subject_id',
        'homework_title',
        'homework_description',
    ),
));
?>
