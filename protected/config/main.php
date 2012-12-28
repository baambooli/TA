<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Kamran Travel Agency',
    // preloading 'log' component
    'preload' => array('log', 'bootstrap',),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.modules.rights.*', 
        'application.modules.rights.components.*', 
    ),
    'modules' => array(
        'rights'=>array( 
            'install'=>true,  // Enables the installer. 
        ), 
   
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123',
            'generatorPaths' => array(
                'bootstrap.gii'
            ),
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('192.168.*', '*'),
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            // this is the default website page
            'loginUrl'=>array('site/login'),
            'class' => 'RWebUser',
        ),
         
         'authManager'=>array( 
            'class'=>'RDbAuthManager',  // Provides support authorization item sorting. 
         ), 
         
        // enable APC cache (By Kamran)
        'cache'=>array(
            'class'=>'system.caching.CApcCache',
        ),
        // uncomment the following to enable URLs in path-format
        /* 'urlManager' => array(
          'urlFormat' => 'path',
          'rules' => array(
          'commentfeed' => array('comment/feed', 'urlSuffix' => '.xml', 'caseSensitive' => false),
          '<pid:\d+>/commentfeed' => array('comment/feed', 'urlSuffix' => '.xml', 'caseSensitive' => false),
          ),
          'showScriptName' => false,
          ),
         */
        // Yii booster (By Kamran)  
        'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap',
            'responsiveCss' => true,
        ),
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=192.168.2.11;dbname=travelagency',
            'emulatePrepare' => true,
            'username' => 'user1',
            'password' => '123',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
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
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
        
        // AES256 encryption key
        'key' => 'my aes256 key.....kamran',
        // MD5 salt 
        'salt' => 'this is kamran\'s salt for hashing passwords', 
    ),
);