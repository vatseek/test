<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

if($_SERVER['HTTP_HOST']=='test.co'){
    defined('YII_DEBUG') or define('YII_DEBUG',true);
    $config=dirname(__FILE__).'/protected/config/dev.php';
}

require_once($yii);
Yii::createWebApplication($config)->run();
