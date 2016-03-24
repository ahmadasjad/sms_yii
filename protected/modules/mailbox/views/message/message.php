<?php
$this->breadcrumbs = array(
    ucfirst($this->module->id) => array('message/inbox'),
    'Message',
);
?>
<div class="row">
    <div class="col-md-3 col-sm-3">
        <?php $this->renderPartial('/default/left_side'); ?>
    </div>
    <div class="col-md-9 col-sm-9">
        <div class="box box-info ">
            <div class="box-header"><h3 class="box-title">Mailbox<span>Check your mails here.</span></h3></div>
            <div class="box-body nav-tabs-custom">
                <?php
                $this->renderPartial('_menu');

                $subject = ($conv->subject) ? $conv->subject : $this->module->defaultSubject;

                if (strlen($subject) > 100) {
                    $subject = substr($subject, 0, 100);
                }
                ?>
                <div >	

                    <div style="padding:10px;">
                        <?php
                        foreach (Yii::app()->user->getFlashes() as $key => $message) {
                            echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
                        }
                        ?>
                        <div class="mailbox-message-subject  mailbox-ellipsis"><?php echo $subject; ?></div>

                        <br />
                        <?php
                        $first_message = 1;
                        foreach ($conv->messages as $msg):
                            $sender = $this->module->getUserName($msg->sender_id);
                            if (!$sender)
                                $sender = $this->module->deletedUser;
                            ?>
                            <div class="msgfeed">
                                <div class="mailbox-message-header">
                                    <div class="message-sender">
                                        <?php
                                        echo ($msg->sender_id == Yii::app()->user->id) ? 'You' : ucfirst($sender);
                                        echo ($first_message) ? ' said' : ' replied';
                                        ?></div>
                                    <div class="message-date"><?php echo date("Y-m-d H:i a", $msg->created); ?></div>
                                    <br />
                                </div>
                                <div class="mailbox-message-text"><?php echo $msg->text; ?></div>
                            </div>
                            <br />
                            <?php
                            $first_message = 0;
                        endforeach;

                        if ($this->module->authManager)
                            $authReply = Yii::app()->user->checkAccess("Mailbox.Message.Reply");
                        else
                            $authReply = $this->module->sendMsgs;

                        if ($authReply) {
                            echo $this->getAction()->getId();

                            if ($this->getAction()->getId() != 'trash') {
                                $form = $this->beginWidget('CActiveForm', array(
                                    'action' => $this->createUrl('message/reply', array('id' => $_GET['id'])),
                                    'id' => 'message-reply-form',
                                    'enableAjaxValidation' => false,
                                ));
                                ?>
                                <div class="mailbox-message-reply ui-helper-clearfix">
                                    <?php /* echo $form->errorSummary(array($reply,$conv)); */ ?>
                                    <?php echo $form->error($reply, 'text'); ?>
                                    <div class="mailbox-textarea-wrap ui-helper-clearfix">
                                        <textarea name="text" cols="50" rows="7" placeholder="Reply here..."></textarea>
                                    </div>
                                    <div class="clear"></div>
                                    <div id="mform" ><input type="submit" value="Send Reply" /></div>
                                </div>



                                <?php
                                $this->endWidget();
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>

