<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'mGlobal',    
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.protected.extensions.*',
		'application.modules.*',
		'application.extensions.*',
	),
	//'theme'=>'metronic',
	'sourceLanguage' => 'en_us',
	'language' => 'en-US',
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'admin',
                'mobile',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>false,
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
//			'ipFilters'=>array('127.0.0.1','::1'),
                    'ipFilters'=>false
		),
		
	),
	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'mail' => array(
 			'class' => 'ext.yii-mail.YiiMail',
 			'transportType'=>'smtp',
                        'transportOptions'=>array(
                                'host'=>'smtp.gmail.com',
                                'username'=>'demo.mglobally@gmail.com',
                                'password'=>'demo@123',
                                'port' => '465',
                                'encryption'=>'tls',                     
                        ),
 			'viewPath' => 'application.views.mail',
 			'logging' => true,
 			'dryRun' => false,
 		),
            'ePdf' => array(
                        'class'     => 'ext.yii-pdf.EYiiPdf',
                        'params'    => array(
                            'mpdf'  => array(
                                'librarySourcePath' => 'application.vendor.mpdf.*',
                                'constants'         => array(
                                    '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                                    ),
                                    'class'=>'mpdf',
                                ),
                            'HTML2PDF' => array(
                                'librarySourcePath' => 'application.vendor.html2pdf.*',
                                'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
                            ),
                            'FB_TW' => array(
                                'librarySourcePath' => 'application.vendor.fb_tw.*',
                                'classFile'         => 'fb_tw.facebook.facebook.php','fb_tw.config.fbconfig.php'  // For adding to Yii::$classMap
                            )
                        ),
                    ),
            
            'curl' => array(
                'class' => 'application.extensions.curl.Curl',
                    //you can setup timeout,http_login,proxy,proxylogin,cookie, and setOPTIONS
                    //eg.
                //'options' => array(),
            ),

        // uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
                        'admin'=>'/admin/default',
        		'mobile'=>'/mobile/site',
				'<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
                    'showScriptName'=>false,
		),
		
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		/*'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=mgloball_demo',
			'emulatePrepare' => true,
			'username' => 'mgloball_mg', 
			'password' => 'mg@123',
			'charset' => 'utf8',
		 	'tablePrefix' => 'tbl_',
                        'enableParamLogging' => true,
		), 
                 
                 //Local
                */
		'db'=>array(

				'connectionString' => 'mysql:host=localhost;dbname=mglobal',
				'emulatePrepare' => true,
				'username' => 'root',
				'password' => 'root',
				'charset' => 'utf8',
                                'tablePrefix' => 'tbl_',
		),
            
                
                'twitter' => array(
                                'class' => 'ext.yiitwitteroauth.YiiTwitter',
                                'consumer_key' => 'JsUWA9cpSn8cCoIdCZQRHba32',
                                'consumer_secret' => 'IA5qJ66PxsOtlqgwwsqcG1Bk5bVh3hhyaP87UHErE7vECTv8IW',

                                'callback' => 'http://localhost/user/callback',

                ),
		
		// Error handler
		'errorHandler'=>array(
				// use 'site/error' action to display errors
				'errorAction'=>'site/error',
				// the above is unused for 404 errors, as those
				// are handled by Wordpress using custom exception handler
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
                            /*array(   //To Show queries uncomment this
                            	'class'=>'CProfileLogRoute',
                                'levels'=>'profile',
                                'enabled'=>true,
                            ),*/
                            array(
                            	'class'=>'CFileLogRoute',
                                'levels'=>'error, warning,trace',
                            ),
                            array(
                                'class'=>'CFileLogRoute',
                                'logFile'=>'sms.log',
                                'categories'=>'sms.*',
                            ),
                            /*array(
                            	'class'=>'CWebLogRoute',
                            ),*/
			),
		),  
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=> require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."parameters.php"),
);