<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(

	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Панель управления',
	'language' => 'ru',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.extensions.shoppingCart.*'
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'open',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'control',
	),

	// application components
	'components'=>array(
        'shoppingCart' =>
        array(
            'class' => 'application.extensions.shoppingCart.EShoppingCart',
        ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'control/<action:\S+>/<id:\d+>'=>'control/<action>',
                'brand/<controller:\w+>/<action:\w+>/<id:\d+>'    => 'brand/<controller>/<action>',
                'brand/<controller:\w+>/<action:\w+>'                => 'brand/<controller>/<action>',
                'brand/<controller:\w+>'                            => 'brand/<controller>/index',
                'product/<controller:\w+>/<action:\w+>/<id:\d+>'    => 'product/<controller>/<action>',
                'product/<controller:\w+>/<action:\w+>'                => 'product/<controller>/<action>',
                'product/<controller:\w+>'                            => 'product/<controller>/index',
                'brand'                                            => 'brand/index',
                'product'                                            => 'product/index',
                'user'                                            => 'user/index',
                'user/<controller:\w+>/<action:\w+>/<id:\d+>'    => 'user/<controller>/<action>',
                'user/<controller:\w+>/<action:\w+>'                => 'user/<controller>/<action>',
                'user/<controller:\w+>'                            => 'user/<controller>/index',
				'control/<action:\S+>' =>'control/<action>',
				'control' => 'control',
				'gii' => 'gii',
				'gii/<action:\S+>/<id:\d+>'=>'gii/<action>',
				'gii/<action:\S+>' =>'gii/<action>',
				'control/login' => 'control/login/index',
				'site/<action:\S+>/<id:\d+>'=>'site/<action>',
				'site/<action:\S+>' =>'site/<action>',
				'<controller:\S+>' => '/site/index',
				'<controller:\w+>/<alias:\w+>' => '/site/index',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
			'showScriptName' => false,
		),
		
		// 'db'=>array(
		// 	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		// ),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=chinadmin',
			'emulatePrepare' => true,
			'username' => 'mysql',
			'password' => 'mysql',
			'charset' => 'utf8',
			'tablePrefix' => 'dev_',
            'enableProfiling'=>true,
            'enableParamLogging' => true,
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
            'enabled'=>YII_DEBUG,
			'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                array(
                    'class'=>'application.extensions.yii-debug-toolbar.YiiDebugToolbarRoute',
                    'ipFilters'=>array('127.0.0.1','192.168.1.215'),
                ),
				/*array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
                array(
                    'class'=>'ext.DbProfileLogRoute',
                    'countLimit' => 1, // How many times the same query should be executed to be considered inefficient
                    'slowQueryMin' => 0.01, // Minimum time for the query to be slow
                ),*/
		
				// uncomment the following to show log messages on web pages

				/*array(
					'class'=>'CWebLogRoute',
				),*/

			),
		),
		// почта в раздел компонентов
		 'mailer' => array(
			 'class' => 'application.extensions.mailer.EMailer',
			 'pathViews' => 'application.views.email',
			 'pathLayouts' => 'application.views.email.layouts'
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'700102@mail.ru',
		'is_production'=>true,
));