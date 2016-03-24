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
                    //The Welcome Link
                    //array('label'=>''.t('Welcome'),  'url'=>array('/message/index') ,'linkOptions'=>array('class'=>'menu_1' ), 'itemOptions'=>array('id'=>'menu_1') 
                    //),
                    // The MailBox Link

                    array('label' => t('Mailbox<br/><span class="text-muted small">All Received Messages</span>'), 'url' => array('/mailbox'),
                        'active' => ((Yii::app()->controller->module->id == 'mailbox' and Yii::app()->controller->id != 'news') ? true : false), 'linkOptions' => array('class' => 'inbox_ico')),
                    array('label' => t('News<br/><span class="text-muted small">All Site News</span>'), 'url' => array('/mailbox/news'),
                        'active' => ((Yii::app()->controller->id == 'news') ? true : false), 'linkOptions' => array('class' => 'news_ico')),
                    //The Events Link
                    //'label'=>''.t('Events'), 'url'=>'javascript:void(0);', 'itemOptions'=>array('id'=>'menu_2'),
                    array('label' => '' . t('<strong>Events</strong>'), 'url' => '',
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
        $('li.active').parent("ul").show();

        $('#othleft-sidebar').children('ul').children('li').children('a').click(function () {

            if ($(this).parent().children('ul').length > 0) {
                $(this).parent().children('ul').toggle();
            }

        });
    });
</script>