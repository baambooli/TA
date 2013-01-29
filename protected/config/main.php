<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Kamran Travel Agency',
    'theme' => 'kamran_theme1',
    
    // preloading 'log' component
    'preload' => array('log', 'bootstrap'),
    
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
    ),
    'modules' => array(
        'rights' => array(
            'install' => true, // Enables the installer.
        ),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123',
            'generatorPaths' => array(
                'bootstrap.gii'
            ),
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.*', '*'),
        ),
    ),
    
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            // this is the default website page
            'loginUrl' => array('site/login'),
            // for RBAC (Rights module)
            'class' => 'RWebUser',
        ),
        
        // for sending email (Email extension)
        'email' => array(
            'class' => 'application.extensions.email.Email',
            'delivery' => 'php', //Will use the php mailing function.
        //May also be set to 'debug' to instead dump the contents of the email into the view
        ),
        'authManager' => array(
            'class' => 'RDbAuthManager', // Provides support authorization item sorting.
        ),
        
        //paypal componet
        'Paypal' => array(
            'class'=>'application.components.Paypal',
            'apiUsername' => 'baambo_1359062345_biz_api1.yahoo.com',
            'apiPassword' => '1359062366',
            'apiSignature' => 'A-s-vwNCAoth.LoWmD7POnvaSJ5-A4Uq8rzmzD-zhCOe1qR3TyyabubY',
            'apiLive' => false,
            
            'returnUrl' => 'paypal/confirm/',
            'cancelUrl' => 'paypal/cancel/',
        ), 
        
        // enable APC cache
        /* 'cache' => array(
          'class' => 'system.caching.CApcCache',
          ), 
        */
          
        
        // Yii booster
        'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap',
            'responsiveCss' => true,
        ),
        
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=127.0.0.1;dbname=travelagency',
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
                // send "error" type messages to /protected/runtime/application.log file.
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // send "info, trace" messages to /protected/runtime/infoMessages.log file.
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'info, trace',
                    'logFile' => 'infoMessages.log',
                ),
                // send "warning" messages to webpage(on screen message)
                array(
                    'class' => 'CWebLogRoute',
                    'levels' => 'warning',
                ),
            ),
        ),
    ),
    
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'Admin@ta.com',
        // AES256 encryption key
        'key' => 'my aes256 key.....kamran',
        // MD5 salt
        'salt' => 'this is kamran\'s salt for hashing passwords',
    ),
);
