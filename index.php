<?php
ob_start();
// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);

//show profiler
defined('YII_DEBUG_SHOW_PROFILER') or define('YII_DEBUG_SHOW_PROFILER',true);

//enable profiling
defined('YII_DEBUG_PROFILING') or define('YII_DEBUG_PROFILING',true);

// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

//execution time
defined('YII_DEBUG_DISPLAY_TIME') or define('YII_DEBUG_DISPLAY_TIME',false);

require_once($yii);
Yii::createWebApplication($config)->run();

if(YII_DEBUG_DISPLAY_TIME)
echo Yii::getLogger()->getExecutionTime();
