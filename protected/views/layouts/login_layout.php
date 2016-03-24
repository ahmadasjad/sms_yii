<html lang="en">
    <head>

        <meta charset="utf-8">

        <?php
        //->prependStylesheet($this->basePath('css/bootstrap.min.css'))
        //->prependStylesheet($this->basePath('css/style.css'));
        ?>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/public/design/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/public/design/dist/css/skins/skin-blue.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/public/design/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/jQuery-2.1.4.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/js/jquery-ui-timepicker-addon.js"></script>


    </head>
    <body class="hold-transition login-page">

        <div id="full_page" style="width:100%;height: 100vh;" class=" vertical-center">
            <div class="container">

                <div class="row">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <h1>Welcome!</h1>
                            <h3 class="text-center">This application is under development</h3>
                        </div>
                    </div>
                    <div class="col-sm-2 col-sm-offset-3 text-center">
                        <button class="btn btn-primary btn-sm btn-go-down">Admin Login</button>
                        <br/>
                        <p>Login: admin -> admin</p>

                    </div>
                    <div class="col-sm-2 text-center">
                        <button class="btn btn-primary btn-sm btn-go-down">Teacher Login</button>
                        <br/>
                        <p>Login: teacher1 -> d8e54d2394</p>

                    </div>
                    <div class="col-sm-2 text-center">
                        <button class="btn btn-primary btn-sm btn-go-down">Student Login</button>
                        <br/>
                        <p>Login: student2 -> student2</p>

                    </div>
                </div>
            </div>
        </div>
        <style>
            .vertical-center {
                min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
                min-height: 100vh; /* These two lines are counted as one :-)       */

                display: flex;
                align-items: center;
            }
        </style>
        <script>
            $(document).ready(function () {
                $('.btn-go-down').click(function () {
                    $('#full_page').slideUp();
                });
                $('#full_page').css('height', window.height);
                $('#full_page').css('width', window.height);
            });
        </script>

        <?php echo $content; ?>

        <footer>
        </footer>
    </body>
</html>















