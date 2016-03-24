<style>
    #jobDialog123
    {
        height:auto;
    }
</style>

<?php
$this->breadcrumbs = array(
    $this->module->id,
);
?>


ِِِِِِْ
<?php
$posts = Courses::model()->findAll("is_deleted 	=:x", array(':x' => 0));
?>

<?php if ($posts != NULL) {
    ?>
    <script>
        function details(id)
        {
            var rr = document.getElementById("dropwin" + id).style.display;

            if (document.getElementById("dropwin" + id).style.display == "block")
            {
                document.getElementById("dropwin" + id).style.display = "none";
                $("#openbutton" + id).removeClass('open');
                $("#openbutton" + id).addClass('view');
            } else if (document.getElementById("dropwin" + id).style.display == "none")
            {
                document.getElementById("dropwin" + id).style.display = "block";
                $("#openbutton" + id).removeClass('view');
                $("#openbutton" + id).addClass('open');
            }
        }
        function rowdelete(id)
        {
            $("#batchrow" + id).fadeOut("slow");
        }
    </script>
    <div class="row">
        <div class="col-md-3 col-sm-3">
            <?php $this->renderPartial('left_side'); ?>
        </div>
        <div class="col-md-9 col-sm-9">
            <div class="box box-info ">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title"><?php echo Yii::t('Courses', 'Manage Courses & Batches'); ?></h3>
                </div>
                <div class="box-body">
                    <div id="jobDialog">
                        <div id="jobDialog1">
                            <?php
                            $posts = Courses::model()->findAll("is_deleted 	=:x", array(':x' => 0));
                            ?>
                            <?php $this->renderPartial('_flash'); ?>
                        </div>
                    </div>
                    <?php foreach ($posts as $posts_1) {
                        ?>
                        <div class="row" >
                            <div class="col-sm-12">
                                <ul class="todo-list">
                                    <li id="jobDialog1">  
                                        <span>
                                            <?php echo $posts_1->course_name; ?>
                                            <?php
                                            $course = Courses::model()->findByAttributes(array('id' => $posts_1->id, 'is_deleted' => 0));
                                            $batch = Batches::model()->findAll("course_id=:x AND is_deleted=:y AND is_active=:z", array(':x' => $posts_1->id, ':y' => 0, ':z' => 1));
                                            ?>
                                            <span><?php echo count($batch); ?> - Batch(es)</span>
                                        </span>
                                        <div class="tools">
                                            <?php
                                            echo CHtml::ajaxLink(Yii::t('Courses', '<i class="glyphicon glyphicon-pencil"></i>&nbsp;Edit&nbsp;&nbsp;&nbsp;'), $this->createUrl('courses/Edit'), array(
                                                'onclick' => '$("#jobDialog11").dialog("open"); return false;',
                                                'update' => '#jobDialog1', 'type' => 'GET', 'data' => array('val1' => $posts_1->id), 'dataType' => 'text'), array('id' => 'showJobDialog123' . $posts_1->id, 'class' => 'edit'));
                                            ?>
                                            <?php
                                            echo CHtml::ajaxLink(Yii::t('Courses', '<i class="glyphicon glyphicon-plus"></i>&nbsp;Add Batch&nbsp;&nbsp;&nbsp;'), $this->createUrl('batches/Addnew'), array(
                                                'onclick' => '$("#jobDialog").dialog("open"); return false;',
                                                'update' => '#jobDialog', 'type' => 'GET', 'data' => array('val1' => $posts_1->id), 'dataType' => 'text',), array('id' => 'showJobDialog1' . $posts_1->id, 'class' => 'add'));
                                            ?>
                                            <a href="#" id="openbutton<?php echo $posts_1->id; ?>" onclick="details('<?php echo $posts_1->id; ?>');" class="view">
                                                <i class="col5"><span class="dwnbg">&nbsp;</span></i>View batches
                                            </a>
                                        </div>
                                        <hr/>

                                        <div class="pdtab_Con" id="dropwin<?php echo $posts_1->id; ?>" style="display: none; padding:0px 0px 10px 0px; ">
                                            <?php
                                            $this->renderPartial('_batches', array(
                                                'batch' => $batch,
                                                'posts_1' => $posts_1,
                                            ));
                                            ?>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div id='check'></div>
                    <?php } ?>   
                </div>

            </div>
        </div>
    </div>


    <?php
} else {
    ?>
    <div class="row">
        <div class="col-md-3 col-sm-3">
            <?php $this->renderPartial('left_side'); ?>
        </div>
        <div class="col-md-9 col-sm-9">
            <div class="box box-info ">
                <div class="box-body nav-tabs-custom">
                    <div class="y_bx_head" style="width:650px;">
                        It appears that this is the first time that you are using this Open-School Setup. For any new installation we recommend that you configure the following:
                    </div>
                    <div class="y_bx_list" style="width:650px;">
                        <h1><?php echo CHtml::link(Yii::t('Courses', 'Add New Course &amp; Batch'), array('courses/create')) ?></h1>
                    </div>    
                </div>            
            </div>
        </div>
    </div>


<?php } ?>
