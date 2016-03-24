<?php /* ?>
  <div id="othleft-sidebar">
  <div class="box box-solid">
  <div class="box-header with-border">
  <h3 class="box-title">My Account</h3>
  <div class="box-tools">
  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
  </div>
  </div>
  <div class="box-body no-padding">
  <?php

  function t($message, $category = 'cms', $params = array(), $source = null, $language = null) {
  return $message;
  }

  $this->widget('zii.widgets.CMenu', array(
  'encodeLabel' => false,
  'activateItems' => true,
  'activeCssClass' => 'active',
  'htmlOptions' => array('class' => 'nav nav-pills nav-stacked'),
  'items' => array(
  array('label' => t('Mailbox<br/><span class="text-muted small">All Received Messages</span>'), 'url' => array('/mailbox'),
  'active' => ((Yii::app()->controller->module->id == 'mailbox' and Yii::app()->controller->id != 'news') ? true : false), 'linkOptions' => array('class' => 'inbox_ico')),
  array('label' => t('News<br/><span class="text-muted small">All Site News</span>'), 'url' => array('/mailbox/news'),
  'active' => ((Yii::app()->controller->id == 'news') ? true : false), 'linkOptions' => array('class' => 'news_ico')),
  array('label' => '' . t('<strong>Events</strong>'),'url'=>'javascript:void(0);',
  'active' => ((Yii::app()->controller->module->id == 'cal') ? true : false)),
  array('label' => t('Events List<br/><span class="text-muted small">All Events</span>'), 'url' => array('/dashboard/default/events'),
  'active' => ((Yii::app()->controller->module->id == 'dashboard') ? true : false), 'linkOptions' => array('class' => 'evntlist_ico')),
  array('label' => t('Calendar<br/><span class="text-muted small">Schedule Events</span>'), 'url' => array('/cal'),
  'active' => (((Yii::app()->controller->module->id == 'cal') and ( Yii::app()->controller->id != 'eventsType')) ? true : false), 'linkOptions' => array('class' => 'cal_ico')),
  array('label' => t('Event Types<br/><span class="text-muted small">Manage Event Types</span>'), 'url' => array('/cal/eventsType'),
  'active' => ((Yii::app()->controller->id == 'eventsType') ? true : false), 'linkOptions' => array('class' => 'evnttype_ico')),
  ),
  ));
  ?>
  </div>
  </div>
  </div>





  <script type="text/javascript">

  $(document).ready(function () {
  //Hide the second level menu
  $('#othleft-sidebar ul li ul').hide();
  //Show the second level menu if an item inside it active
  $('li.list_active').parent("ul").show();

  $('#othleft-sidebar').children('ul').children('li').children('a').click(function () {

  if ($(this).parent().children('ul').length > 0) {
  $(this).parent().children('ul').toggle();
  }

  });
  });
  </script>
  <?php */ ?>


<style>
    .mailbox-menu-newgrpmsg{
        -moz-box-shadow:inset 0px 0px 0px 0px #ffffff !important;
        -webkit-box-shadow:inset 0px 0px 0px 0px #ffffff !important ;
        box-shadow:inset 0px 0px 0px 0px #ffffff !important;
        background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #1bb4fa), color-stop(1, #0994f0) ) !important;
        background:-moz-linear-gradient( center top, #1bb4fa 5%, #0994f0 100% ) !important;
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#1bb4fa', endColorstr='#0994f0') !important;
        background-color:#1bb4fa !important;
        -moz-border-radius:3px !important;
        -webkit-border-radius:3px !important;
        border-radius:3px !important;
        border:1px solid #0c93d1 !important;
        display:inline-block;
        color:#ffffff !important;
        font-family:arial;
        font-size:12px;
        font-weight:bold;
        padding:8px 14px !important;
        text-decoration:none;
        position:absolute;
        top:16px;
        right:146px;
        /*text-shadow:1px 0px 0px #0664a3;*/
    }
    .mailbox-menu-newgrpmsg a{color:#fff !important; text-decoration:none !important; display:block;}

</style>

<?php
$newMsgs = $this->module->getNewMsgs();
$action = $this->getAction()->getId();

if ($this->module->authManager) {
    $authNew = Yii::app()->user->checkAccess("Mailbox.Message.New");
    $authInbox = Yii::app()->user->checkAccess("Mailbox.Message.Inbox");
    $authSent = Yii::app()->user->checkAccess("Mailbox.Message.Sent");
    $authTrash = Yii::app()->user->checkAccess("Mailbox.Message.Trash");
} else {
    $authNew = $this->module->sendMsgs && (!$this->module->readOnly || $this->module->isAdmin());
    $authInbox = (!$this->module->readOnly || $this->module->isAdmin() );
    $authTrash = $this->module->trashbox && (!$this->module->readOnly || $this->module->isAdmin());
    $authSent = $this->module->sentbox && (!$this->module->readOnly || $this->module->isAdmin());
}
?>






















<?php
if ($authNew) :
    ?>
    <a href="<?php echo $this->createUrl('message/new'); ?>" class="btn btn-primary btn-block margin-bottom">Compose</a>
    <?php
endif;
?>

<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Folders</h3>
        <div class="box-tools">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
            <?php if ($authInbox): ?>
                <li class="<?php echo ($action == 'inbox') ? 'active' : ''; ?>">
                    <a href="<?php echo $this->createUrl('message/inbox'); ?>">
                        <i class="fa fa-inbox"></i> Inbox 
                        <!--<span class="label label-primary pull-right">12</span>-->
                    </a>
                </li>
                <?php
            endif;
            if ($authSent) :
                ?>
                <li class="<?php echo ($action == 'sent') ? 'active' : ''; ?>">
                    <a href="<?php echo $this->createUrl('message/sent'); ?>">
                        <i class="fa fa-envelope-o"></i> Sent
                    </a>
                </li>
                <?php
            endif;
            if ($authTrash) :
                ?>
                <li class="<?php echo ($action == 'trash') ? 'active' : ''; ?>">
                    <a href="<?php echo $this->createUrl('message/trash'); ?>">
                        <i class="fa fa-trash-o"></i> Trash
                    </a>
                </li>
            <?php endif; ?>
                
            
            <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
            <!--<li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a></li>-->
            
        </ul>
    </div><!-- /.box-body -->
</div>