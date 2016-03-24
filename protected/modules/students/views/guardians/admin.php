<style>
    .items tr:nth-child(3) {background:#F00;}
</style>
<?php
$this->breadcrumbs = array(
    'Guardians' => array('admin'),
    'Manage',
);
?>
<div class="row">
    <div class="col-md-3 col-sm-3">
        <?php $this->renderPartial('/default/left_side'); ?>
    </div>
    <div class="col-md-9 col-sm-9">
        <div class="box box-info ">
            <div class="box-header"><h3 class="box-title"><?php echo Yii::t('students', 'Manage Guardians'); ?></h3></div>
            <div class="box-body nav-tabs-custom">
                <?php
                $this->menu = array(
                        //array('label'=>'List Guardians', 'url'=>array('index')),
                        //array('label'=>'Create Guardians', 'url'=>array('create')),
                );

                Yii::app()->clientScript->registerScript('search', "
                    $('.search-button').click(function(){
                            $('.search-form').toggle();
                            return false;
                    });
                    $('.search-form form').submit(function(){
                            $.fn.yiiGridView.update('guardians-grid', {
                                    data: $(this).serialize()
                            });
                            return false;
                    });
                    ");
                ?>
                <div class="cont_right formWrapper">
                    <?php /* ?><div class="c_subbutCon" align="right" style="width:100%">
                      <div class="c_cubbut" style="width:320px;">
                      <ul>
                      <li>
                      <?php echo CHtml::link('Create New Guardian', array(''),array('class'=>'addbttn'));?>
                      </li>
                      <li>
                      <?php echo CHtml::link('Associate Guardian', array(''),array('class'=>'addbttn last'));?>
                      </li>
                      </ul>
                      <div class="clear"></div>
                      </div>
                      </div><?php */ ?>
                    <?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
                    <div class="search-form" style="display:none">
                        <?php
                        $this->renderPartial('_search', array(
                            'model' => $model,
                        ));
                        ?>
                    </div><!-- search-form -->

                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'guardians-grid',
                        'dataProvider' => $model->search(),
                        'filter' => $model,
                        'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/formstyle.css'),
                        'cssFile' => Yii::app()->baseUrl . '/css/formstyle.css',
                        'htmlOptions'=>array(
                            //'class'=>'table'
                        ),
                        'columns' => array(
                            array('name' => 'first_name',
                                'header' => 'Name',
                                'type' => 'raw',
                                'value' => array($model, 'parentname')),
                            array('name' => 'relation',
                                'type' => 'raw',
                                'value' => '$data->relation'),
                            array('name' => 'ward_id',
                                'type' => 'raw',
                                'value' => array($model, 'studentname'),
                                'filter' => false,
                                'htmlOptions' => array('style' => 'width:250px;')
                            ),
                            array('name' => 'email',
                                'type' => 'raw',
                                'value' => '$data->email'),
                            /* 'id',
                              'ward_id',
                              'first_name',
                              'last_name',
                              'relation',
                              'email', */
                            /*
                              'office_phone1',
                              'office_phone2',
                              'mobile_phone',
                              'office_address_line1',
                              'office_address_line2',
                              'city',
                              'state',
                              'country_id',
                              'dob',
                              'occupation',
                              'income',
                              'education',
                              'created_at',
                              'updated_at',
                             */
                            array(
                                'header' => 'Action',
                                'class' => 'CButtonColumn',
                                'htmlOptions' => array('style' => 'width:80px;'),
                                //'template' => '{delete}',
                                'headerHtmlOptions' => array('style' => 'font-size:12px; font-weight:bold;')
                            ),
                        ),
                    ));
                    ?>
                </div>
            </div>            
        </div>
    </div>
</div>

