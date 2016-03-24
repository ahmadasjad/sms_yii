<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
    <head>

        <meta charset="utf-8">
            <?php //echo $this->headTitle('Admin |' . $this->translate(' Dashbaord'))->setSeparator(' - ')->setAutoEscape(false) ?>

            <?php
            /* echo $this->headMeta()
              ->appendName('viewport', 'width=device-width, initial-scale=1.0')
              ->appendHttpEquiv('X-UA-Compatible', 'IE=edge'); */
            ?>


            <!-- Le styles -->
            <?php
            //echo $this->headLink(array('rel' => 'shortcut icon', 'type' => 'image/vnd.microsoft.icon', 'href' => $this->basePath() . '/img/download.jpg'))
//                ->prependStylesheet($this->basePath('css/bootstrap.min.css'))
            //->prependStylesheet($this->basePath('css/AdminLTE.min.css'))
            //->prependStylesheet($this->basePath('css/style.css'))
            //->prependStylesheet($this->basePath('css/skins/blue.css'));
            ?>
            <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"/>


            <!-- Bootstrap 3.3.5 -->
            <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/public/design/bootstrap/css/bootstrap.min.css"/>
            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>
            <!-- Ionicons -->
            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
            <!-- Theme style -->
            <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/public/design/dist/css/AdminLTE.css"/>
            <!--            Equal Height-->
            <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/public/css/equal-height-columns.css"/>
            <!-- AdminLTE Skins. Choose a skin from the css/skins
                     folder instead of downloading all of them to reduce the load. -->
            <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/public/design/dist/css/skins/_all-skins.min.css"/>
            <!-- iCheck -->
            <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/public/design/plugins/iCheck/flat/blue.css"/>
            <!-- Morris chart -->
            <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/public/design/plugins/morris/morris.css"/>
            <!-- jvectormap -->
            <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/public/design/plugins/jvectormap/jquery-jvectormap-1.2.2.css"/>
            <!-- Date Picker -->
            <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/public/design/plugins/datepicker/datepicker3.css"/>
            <!-- Daterange picker -->
            <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/public/design/plugins/daterangepicker/daterangepicker-bs3.css"/>
            <!-- bootstrap wysihtml5 - text editor -->
            <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/public/design/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"/>
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

            <?php
            $cs = Yii::app()->clientScript;
            $cs->scriptMap = array(
                'jquery' => false,
            );
            
            ?>

            
            <!--<script src="https://code.jquery.com/jquery-1.6.4.min.js"></script>-->
            <!-- jQuery 2.1.4 -->
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/design/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    </head>
    <body  class="hold-transition skin-blue sidebar-mini">
