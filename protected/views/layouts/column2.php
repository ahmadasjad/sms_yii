<?php $this->beginContent('//layouts/main'); ?>
<div id="content">
    <?php echo $content; ?>
</div>
<?php 
/*
?>
<div class="container">
    <div class="span-19">

    </div>
    <div class="span-5 last">
        <div id="sidebar">
            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title' => 'Operations',
            ));


            $this->widget('zii.widgets.CMenu', array(
                'items' => $this->menu,
                'htmlOptions' => array('class' => 'operations'),
            ));
            $this->endWidget();
            ?>
        </div>
    </div>
</div>
<?php */ ?>
<?php $this->endContent(); ?>