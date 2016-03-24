<?php
$this->breadcrumbs = array(
    'Rights' => Rights::getBaseUrl(),
    Rights::t('core', 'Generate items'),
);
?>

<div class="box-header"><h3 class="box-title"><?php echo Rights::t('core', 'Generate items'); ?></h3></div>

<div id="generator">

    <p><?php echo Rights::t('core', 'Please select which items you wish to generate.'); ?></p>

    <div class="form">

        <?php $form = $this->beginWidget('CActiveForm'); ?>

        <table class="table table-striped" border="0" cellpadding="0" cellspacing="0">

            <tbody>

                <tr class="augen-heading-row">
                    <th colspan="3"><?php echo Rights::t('core', 'Application'); ?></th>
                </tr>

                <?php
                $this->renderPartial('_generateItems', array(
                    'model' => $model,
                    'form' => $form,
                    'items' => $items,
                    'existingItems' => $existingItems,
                    'displayModuleHeadingRow' => true,
                    'basePathLength' => strlen(Yii::app()->basePath),
                ));
                ?>

            </tbody>

        </table>

        <div class="row">
            <div class="col-sm-12">
                <?php
                echo CHtml::link(Rights::t('core', 'Select all'), '#', array(
                    'onclick' => "jQuery('.generate-item-table').find(':checkbox').attr('checked', 'checked'); return false;",
                    'class' => 'selectAllLink'));
                ?>
                /
                <?php
                echo CHtml::link(Rights::t('core', 'Select none'), '#', array(
                    'onclick' => "jQuery('.generate-item-table').find(':checkbox').removeAttr('checked'); return false;",
                    'class' => 'selectNoneLink'));
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php echo CHtml::submitButton(Rights::t('core', 'Generate'), array('class' => 'formbut')); ?>
            </div>
        </div>

        <?php $this->endWidget(); ?>

    </div>

</div>