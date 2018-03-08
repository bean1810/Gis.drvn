<?php
/**
 * Created by PhpStorm.
 * User: Dung
 * Date: 8/17/2017
 * Time: 2:58 PM
 */
defined('YII_DEBUG') or define('YII_DEBUG',true);

// including Yii
$yii=dirname(__FILE__).'/../../framework/yii.php';
require_once($yii);

// we'll use a separate config file
$configFile='config/cron.php';

// creating and running console application
Yii::createConsoleApplication($configFile)->run();