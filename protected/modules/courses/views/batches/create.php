
<style>
    #jobDialog
    {
        height:auto !important;

    }
</style>
<?php
$this->breadcrumbs = array(
    'Batches' => array('/courses'),
    'Create',
);
?>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui-style.css" />

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'jobDialog',
    'options' => array(
        'title' => Yii::t('job', 'Add New Batch'),
        'autoOpen' => true,
        'modal' => 'true',
        'width' => '400',
        'height' => 'auto',
        'resizable' => false,
    ),
));
?>
<?php echo $this->renderPartial('_form', array('model' => $model, 'val1' => $_GET['val1']));
?>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>

