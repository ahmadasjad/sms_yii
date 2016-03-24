<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/rights_style.css" />

<?php $this->beginContent(Rights::module()->appLayout); ?>

<div class="row">
    <div class="col-md-3 col-sm-3">
        <?php if ($this->id !== 'install'): ?>
            <?php $this->renderPartial('/_menu'); ?>
        <?php endif; ?>
    </div>
    <div class="col-md-9 col-sm-9">
        <div class="box box-info ">
            <div class="box-body nav-tabs-custom">
                <?php $this->renderPartial('/_flash'); ?>
                <?php echo $content; ?>
            </div>            
        </div>
    </div>
</div>

<?php $this->endContent(); ?>
