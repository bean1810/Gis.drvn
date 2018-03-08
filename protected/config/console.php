<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'GoongLanding',

    // preloading 'log' component
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.commands.*',
    ),

    // application components
    'components' => array(
        'db2' => array(
            'connectionString' => 'pgsql:host=123.31.23.193;port=5432;dbname=GoongV2_production',
            'emulatePrepare' => true,
            'username' => 'goong',
            'password' => '2B@Trung',
            'charset' => 'utf8',
            'tablePrefix' => '',
            'class' => 'CDbConnection',
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => require(dirname(__FILE__) . '/params.php'),
);