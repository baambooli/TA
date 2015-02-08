<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Kamran Travel Agency',
    'theme' => 'kamran_theme1',
    
    // preloading 'log' and 'bootstrap' components
    'preload' => array('log', 'bootstrap', 'errorHandler'),
    
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
		'bootstrap.helpers.TbHtml',
		'bootstrap.helpers.*',
		'bootstrap.widgets.*',
		'bootstrap.behaviors.*',
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
		'audit' => array(
            // path to the AuditModule class
            'class' => 'audit.AuditModule',
 
            // set this to your user view url,
            // AuditModule will replace --user_id-- with the actual user_id
            'userViewUrl' => array('/user/view', 'id' => '--user_id--'),
 
            // Set to false if you do not wish to track database audits.
            'enableAuditField' => true,
 
            // The ID of the CDbConnection application component. If not set, a SQLite3
            // database will be automatically created in protected/runtime/audit-AuditVersion.db.
            'connectionID' => 'db',
 
            // Whether the DB tables should be created automatically if they do not exist. Defaults to true.
            // If you already have the table created, it is recommended you set this property to be false to improve performance.
            'autoCreateTables' => true,
 
            // The layout used for module controllers.
            'layout' => 'audit.views.layouts.column1',
 
            // The widget used to render grid views.
            'gridViewWidget' => 'bootstrap.widgets.TbGridView',
 
            // The widget used to render detail views.
            'detailViewWidget' => 'zii.widgets.CDetailView',
 
            // Defines the access filters for the module.
            // The default is AuditAccessFilter which will allow any user listed in AuditModule::adminUsers to have access.
            'controllerFilters' => array(
                'auditAccess' => array('audit.components.AuditAccessFilter'),
            ),
 
            // A list of users who can access this module.
            'adminUsers' => array('admin'),
 
            // The path to YiiStrap.
            // Only required if you do not want YiiStrap in your app config, for example, if you are running YiiBooster.
            // Only required if you did not install using composer.
            // Please note:
            // - You must download YiiStrap even if you are using YiiBooster in your app.
            // - When using this setting YiiStrap will only loaded in the menu interface (eg: index.php?r=menu).
            'yiiStrapPath' => 'vendor/crisu83/yiistrap',
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
          
        
        // YiiStap
        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',   
        ),
        
        //  MySQL database settings
        'db' => array(
            'connectionString' => 'mysql:host=127.0.0.1;dbname=travelagency',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        
			// set to true to enable database query logging
            // don't forget to put `profile` in the log route `levels` below
            'enableProfiling' => true,
 
            // set to true to replace the params with the literal values
            'enableParamLogging' => true,
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                // add a new log route
                array(
                    // path to the AuditLogRoute class
                    'class' => 'audit.components.AuditLogRoute',
 
                    // can be: trace, warning, error, info, profile
                    // can also be anything else you want to pass as a level to `Yii::log()`
                    'levels' => 'error, warning, profile, audit',
                ),
            ),
        ),
		
        'errorHandler' => array(
            // path to the AuditErrorHandler class
            'class' => 'audit.components.AuditErrorHandler',
 
            // set this as you normally would for CErrorHandler
            'errorAction' => 'site/error',
 
            // Set to false to only track error requests.  Defaults to true.
            'trackAllRequests' => false,
 
            // Set to false to not handle fatal errors.  Defaults to true.
            'catchFatalErrors' => true,
 
            // Request keys that we do not want to save in the tracking data.
            'auditRequestIgnoreKeys' => array('PHP_AUTH_PW', 'password'),
 
        ),
    ),
			     
	'aliases' => array(
        'vendor' => 'protected/vendor',
		'audit' => 'protected/vendor/cornernote/yii-audit-module/audit',
		'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
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
