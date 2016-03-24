<div class="box-body">
    <form method="post">
        <div class="row">
            <div class="col-sm-6 form-group">
                <?php
                echo CHtml::hiddenField("role_id", $_GET['id']);
                //echo CHtml::dropDownList('role_id', '', CHtml::listData(Roles::model()->findAll(), 'id', 'name'), array('class' => 'form-control'));
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 form-group">
                <?php
                echo $menu_items_html;
                ?>
            </div> 

        </div>
        <div class="row">
            <div class="col-sm-12 form-group">
                <input type="submit" name="submit" value="submit" class="btn btn-primary btn-sm"/>
            </div> 

        </div>
    </form>
</div>
<script>
    jQuery(document).ready(function () {
        $(function () {
            $("input[type='checkbox']").change(function () {
                $(this).siblings('ul')
                        .find("input[type='checkbox']")
                        .prop('checked', this.checked);
            });
        });
    });
</script>


