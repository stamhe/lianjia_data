<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'defaultRoute'	=> 'site/index',
//     'catchAll'	=> 'site/index',	// 维护模式，全拦截路由，web应用临时调整到维护模式，所有的请求都会显示相同的信息页
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'aadsldsa!@#$%!@#1321321dsjlas',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                ],
            ],
        ],
//         'db' => require(__DIR__ . '/db.php'),
		'db'	=> [
			'class' => 'yii\db\Connection',
    		'dsn' => 'mysql:host=127.0.0.1;dbname=lianjia',
    		'username' => 'root',
    		'password' => '123456',
    		'charset' => 'utf8',
		],
		
        'urlManager' => [
            'enablePrettyUrl'	=> true,
            'showScriptName'	=> false,
//             "suffix"			=> ".html",
            'rules' => [
            ],
        ],
        
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
