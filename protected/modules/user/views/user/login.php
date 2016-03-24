<?php /* ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="language" content="en" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/login.css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/capslock.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js_plugins/showpassword/jquery.showPassword.js"></script>
  <script type="text/javascript">

  function clearText(field)
  {
  if (field.defaultValue == field.value)
  field.value = '';

  else if (field.value == '')
  field.value = field.defaultValue;
  }

  </script>
  <script>
  $(document).ready(function () {
  $(':password').showPassword({
  linkRightOffset: 5,
  linkTopOffset: 8,
  linkText: '',
  showPasswordLinkText: '',
  });
  });
  </script>

  <style>

  .show-password-link {
  display: block;
  position: absolute;
  z-index: 11;
  background:url(images/psswrd_shwhide_icon.png) no-repeat;
  width:18px;
  height:12px;
  left: 212px !important;





  }
  .password-showing {
  position: absolute;
  z-index: 10;
  }
  </style>
  <title>:: OPEN SCHOOL ::</title>
  </head>
  <?php
  $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Login");
  $this->breadcrumbs = array(
  UserModule::t("Login"),
  );
  ?>
  <!--<div class="loginimg"></div>-->
  <div class="loginboxWrapper">
  <div class="lw_left">
  <div class="lw_logo"><img src="images/login-logo.png" width="171" height="161" /></div>
  </div>
  <div class="lw_right">
  <h1><?php echo UserModule::t("Login"); ?></h1>

  <?php if (Yii::app()->user->hasFlash('loginMessage')): ?>

  <div class="success">
  <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
  </div>

  <?php endif; ?>

  <p><?php echo UserModule::t("Please fill out the following form with your login credentials:"); ?></p>

  <div class="form">

  <?php echo CHtml::beginForm(); ?>


  <?php
  if (CHtml::errorSummary($model)) {
  ?>
  <span class="errorSummary">The username or password you entered is incorrect.</span>
  <?php } ?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td>
  <?php echo CHtml::activeTextField($model, 'username', array('onblur' => 'clearText(this)', 'onfocus' => 'clearText(this)', 'value' => 'Username or Email ')) ?></td>
  </tr>
  <tr>
  <td><?php echo CHtml::activePasswordField($model, 'password', array('onblur' => 'clearText(this)', 'onfocus' => 'clearText(this)', 'value' => 'Password')) ?></td>
  </tr>
  <tr><td id="pid" style="color:#C60;background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/warning.png) no-repeat;display:none;padding-left:25px;"></td></tr>
  <tr>
  <td style="padding:0px;">
  <table width="60%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td style="padding:0px;"><?php echo CHtml::activeCheckBox($model, 'rememberMe'); ?></td>
  <td align="left" style="padding:0px;"><?php echo CHtml::activeLabelEx($model, Yii::t('user', 'rememberMe')); ?></td>
  </tr>
  </table>


  </td>
  </tr>
  <tr>
  <td>
  <table width="60%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td><?php echo CHtml::submitButton(UserModule::t("Login"), array('class' => 'loginbut')); ?></td>
  <td><?php echo CHtml::link(UserModule::t("Lost Password?"), Yii::app()->getModule('user')->recoveryUrl); ?></td>
  </tr>
  </table>

  </td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  </tr>
  </table>

  <?php echo CHtml::endForm(); ?>
  </div>
  </div>
  <div class="clear"></div>
  </div>
  </body>
  </html>


  <?php */ ?>
<?php
$form = new CForm(array(
    'elements' => array(
        'username' => array(
            'type' => 'text',
            'maxlength' => 32,
        ),
        'password' => array(
            'type' => 'password',
            'maxlength' => 32,
        ),
        'rememberMe' => array(
            'type' => 'checkbox',
        )
    ),
    'buttons' => array(
        'login' => array(
            'type' => 'submit',
            'label' => 'Login',
        ),
    ),
        ), $model);
?>

<script type="text/javascript">

    function clearText(field)
    {
        if (field.defaultValue == field.value)
            field.value = '';

        else if (field.value == '')
            field.value = field.defaultValue;
    }

</script> 
<script>
    $(document).ready(function () {
//        $(':password').showPassword({
//            linkRightOffset: 5,
//            linkTopOffset: 8,
//            linkText: '',
//            showPasswordLinkText: '',
//        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {

//        var options = {
//            caps_lock_on: function () {
//                $('#pid').css({"display": "block"});
//                $('#pid').html("Caps lock is on");
//            },
//            caps_lock_off: function () {
//                $('#pid').css({"display": "none"});
//            },
//        };
//        $("input[type='password']").capslock(options);

    });
</script>

<?php
$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Login");
$this->breadcrumbs = array(
    UserModule::t("Login"),
);
?>

<?php if (Yii::app()->user->hasFlash('loginMessage')): ?>
    <div class="success">
        <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
    </div>
<?php endif; ?>


<div class="login-box">
    <div class="login-logo">        
        <?php
        if (CHtml::errorSummary($model)) {
            ?>
            <span class="errorSummary">The username or password you entered is incorrect.</span>
        <?php } ?>
    </div>
    <div class="login-box-body">
        <?php echo CHtml::beginForm(); ?>
        <div class="middle">
            <p class="login-box-msg">Sign in to start your session</p>
            <div class="form-group has-feedback ">
                <?php echo CHtml::activeTextField($model, 'username', array('onblur' => 'clearText(this)', 'onfocus' => 'clearText(this)', 'value' => 'Username or Email ', 'class' => 'form-control')) ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback ">
                <?php echo CHtml::activePasswordField($model, 'password', array('onblur' => 'clearText(this)', 'onfocus' => 'clearText(this)', 'value' => 'Password', 'class' => 'form-control')) ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <label class="">
                        <?php echo CHtml::activeCheckBox($model, 'rememberMe'); ?>
                        <ins style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;" class="iCheck-helper"></ins>
                        <?php echo CHtml::activeLabelEx($model, Yii::t('user', 'rememberMe')); ?>
                    </label>
                </div>
                <div class="col-xs-4">
                    <?php echo CHtml::submitButton(UserModule::t("Login"), array('class' => 'loginbut btn btn-primary')); ?>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?php echo CHtml::link(UserModule::t("Lost Password?"), Yii::app()->getModule('user')->recoveryUrl); ?>
                </div>
            </div>


        </div>
        <?php echo CHtml::endForm(); ?>
    </div>  
</div>