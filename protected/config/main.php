<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Sites name',

    // preloading 'log' component
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*'
    ),

    'defaultController' => 'home',

    // application components
    'components' => array(
            'db' => array(
	            'connectionString' => 'pgsql:host=45.124.95.137;port=5432;dbname=GoongV2_production',
	            'emulatePrepare' => true,
	            'username' => 'goong',
	            'password' => '2B@Trung',
	            'charset' => 'utf8',
	            'tablePrefix' => '',
	            'class' => 'CDbConnection',
        ),
        'db2' => array(
	        'connectionString' => 'pgsql:host=45.124.95.137;port=5432;dbname=GoongV2_production',
	        'emulatePrepare' => true,
	        'username' => 'goong',
	        'password' => '2B@Trung',
	        'charset' => 'utf8',
	        'tablePrefix' => '',
	        'class' => 'CDbConnection',
        ),
        'errorHandler' => array(
            // use 'error' action to display errors
            'errorAction' => 'error',
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'urlSuffix' => '.html',
            'rules' => array(
                '<action:(download)>' => 'home/<action>',
                '<action:(bridge)>' => 'home/<action>',
                '<controller:\w+>' => '<controller>/index',
                '<controller:\w+>/<id:\d+>' => '<controller>/index',
                '<controller:\w+>/<lat>,<lng>,<id:\d+>' => '<controller>/index',
                '<controller:\w+>/<lat>,<lng>' => '<controller>/index',
                '<controller:\w+>/<id:\d+>.<alias>' => '<controller>/index',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => require(dirname(__FILE__) . '/params.php'),
);
