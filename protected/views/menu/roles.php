<div class="box-body">
    <table class="table table-striped">
        <tr>
            <td>Role ID</td>
            <td>Role Name</td>
        </tr>
        <?php
        foreach ($roles as $role){
            ?>
        <tr>
            <td><?php echo $role['id']; ?></td>
            <td><?php echo CHtml::link($role['name'], array('menu/rolemenu&id='.$role['id']), array()) ?></td>
        </tr>
                <?php
        }
        ?>
    </table>
</div>


