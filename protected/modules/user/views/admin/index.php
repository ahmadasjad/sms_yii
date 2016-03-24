
<?php
$this->breadcrumbs = array(
    UserModule::t('Users') => array('/user'),
    UserModule::t('Manage'),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});	
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('user-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<div class="row">
    <div class="col-md-3 col-sm-3">
        <?php $this->renderPartial('//configurations/left_side'); ?>
    </div>
    <div class="col-md-9 col-sm-9">
        <div class="box box-info ">
            <div class="box-header"><h3 class="box-title"><?php echo UserModule::t("Manage Users"); ?></h3></div>
            <div class="box-body nav-tabs-custom">
                <div class="cont_right formWrapper">
                    <div class="row">
                        <div class="col-sm-3">
                            <?php echo CHtml::link('<span>Create User</span>', array('/user/admin/create'), array('class' => 'addbttn last btn btn-primary')); ?>    
                        </div>
                    </div>

                    <div class="search-form" style="display:none">
                        <?php
                        $this->renderPartial('_search', array(
                            'model' => $model,
                        ));
                        ?>
                    </div><!-- search-form -->

                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'user-grid',
                        'dataProvider' => $model->search(),
                        'filter' => $model,
                        'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/formstyle.css'),
                        'cssFile' => Yii::app()->baseUrl . '/css/formstyle.css',
                        'columns' => array(
                            /* array(
                              'name' => 'id',
                              'type'=>'raw',
                              'value' => 'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
                              ), */
                            array(
                                'name' => 'username',
                                'type' => 'raw',
                                'value' => array($model, 'name'),
                            ),
                            array(
                                'header' => 'Role',
                                'type' => 'raw',
                                'value' => array($model, 'role'),
                            ),
                            array(
                                'name' => 'email',
                                'type' => 'raw',
                                'value' => 'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
                            ),
                            'lastvisit_at',
                            //'lastvisit_at',
                            /* array(
                              'name'=>'superuser',
                              'value'=>'User::itemAlias("AdminStatus",$data->superuser)',
                              'filter'=>User::itemAlias("AdminStatus"),
                              ),
                              array(
                              'name'=>'status',
                              'value'=>'User::itemAlias("UserStatus",$data->status)',
                              'filter' => User::itemAlias("UserStatus"),
                              ), */
                            array(
                                'class' => 'CButtonColumn',
                            ),
                        ),
                    ));
                    ?>
                </div>
            </div>            
        </div>
    </div>
</div>

