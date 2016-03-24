<?php
/* @var $this ClassHomeworkController */
/* @var $model ClassHomework */

$this->breadcrumbs = array(
    'Class Homeworks' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List ClassHomework', 'url' => array('index')),
    array('label' => 'Create ClassHomework', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#class-homework-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Class Homeworks</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'class-homework-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'batch_id',
        //'employee_id',
        array(
            'name' => 'employee_id',
            'value' => '$data->employee->first_name." ".$data->employee->last_name'
        ),
        'subject_id',
        'homework_title',
        'homework_description',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
