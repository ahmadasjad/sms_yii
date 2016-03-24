<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1><?php //echo $this->uniqueId . '/' . $this->action->id; ?></h1>
<?php
$user = Yii::app()->getUser();
//echo '<pre>';
//var_dump($_SESSION);
//var_dump($_SESSION['profile']);
//foreach ($_SESSION['student'] as $menu){
//    var_dump($user);
//}
//echo '</pre>';
?>
<h1>Welcome <?php //echo $user->guestName ?><?php echo @$_SESSION['profile']['full_name']; ?>!</h1>


<!--<p>
This is the view content for action "<?php echo $this->action->id; ?>".
The action belongs to the controller "<?php echo get_class($this); ?>"
in the "<?php echo $this->module->id; ?>" module.
</p>-->
