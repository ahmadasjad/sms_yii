<?php include('header.php'); ?>
<div class="wrapper">
    <header class="main-header">
        <?php include('top_header.php'); ?>
    </header>

    <aside class="main-sidebar">
        <?php include('navigation.php'); ?>
    </aside>

    <div class="content-wrapper" style="min-height: 450px;">
        <section class="content" style="overflow-y: auto;">
            <?php echo $content; ?>
        </section>
    </div>
</div>
<?php include('footer.php'); 