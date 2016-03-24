<?php
/*
?>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style_404.css" rel="stylesheet" type="text/css" />
<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<body>
    <div class="body" style="text-align: center;">
  <div class="box-body">
      <br/><br/>
  <h1><?php echo CHtml::encode($message); ?>...</h1>
  <p><a href="#" onClick="window.history.go(-1); return false;">go back</a> or <?php echo CHtml::link(UserModule::t("logout"),Yii::app()->getModule('user')->logoutUrl,array('style'=>"color:#f37d36;")); ?></p>
  </div>
    
</div>
</body>
<?php
*/
?>

<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2>Error <?php echo $code; ?></h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>
