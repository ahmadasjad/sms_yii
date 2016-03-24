

<?php
$this->breadcrumbs = array(
    'Default'
);
?>

<?php
$serverurl = "http://licence-server.open-school.org/news.php";

$info['severname'] = Yii::app()->request->hostInfo . Yii::app()->request->baseUrl;

// start a curl session
$ch = curl_init($serverurl);

// return the output, don't print it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// set curl to send post data
curl_setopt($ch, CURLOPT_POST, true);

// set the post data to be sent
curl_setopt($ch, CURLOPT_POSTFIELDS, $info);

// get the server response
$result = curl_exec($ch);

// convert the json to an array
$result = json_decode($result, true);
?>
<div class="row">
    <div class="col-md-3 col-sm-3">
        <?php $this->renderPartial('/default/left_side'); ?>
    </div>
    <div class="col-md-9 col-sm-9">
        <div class="box box-info ">
            <div class="box-header"><h3 class="box-title">Latest News</h3></div>
            <div class="box-body nav-tabs-custom">
                <?php
                if (isset($result) and sizeof($result) > 0) {
                    /*foreach ($result as $news) {
                        ?>
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <div class="label label-primary"><?php echo date('d M Y', strtotime($news['date'])); ?></div>
                                <div class="latest_news_cntntbx_brdr"></div>
                                <div class="latest_news_cntntbx_cntnt"><?php echo $news['news']; ?> </div>
                            </div>
                            
                        </div>
                        <?php
                    }*/
                } else {
                    ?>
                    <div class="latest_news_cntntbx">
                        Nothing Found !!
                    </div>
                <?php } ?>
            </div>            
        </div>
    </div>
</div>


