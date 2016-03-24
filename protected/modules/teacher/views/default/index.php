<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>

Welcome <?php echo $_SESSION['profile']['full_name']; ?>!