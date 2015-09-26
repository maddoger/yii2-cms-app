<?php

return [
    'id' => 'app-backend',
    'name' => 'syrchikov.name',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', /*'admin'*/],
    'controllerNamespace' => 'backend\controllers',

    'modules' => [
//        'admin' => [
//            'class' => 'maddoger\admin\Module',
//            'superUserId' => 1,
//            'sortNumber' => 11,
//        ],
//        'website' => [
//            'class' => 'maddoger\website\backend\Module',
//            'sortNumber' => 10,
//        ],
//        'filemanager' => [
//            'class' => 'maddoger\elfinder\Module',
//            'sortNumber' => 3,
//        ],
//        'blog' => [
//            'class' => 'common\modules\blog\backend\Module',
//            'sortNumber' => 1,
//        ],
    ],

    //Maddoger`s Admin Panel
    //'defaultRoute' => 'admin/site/index',
    //'layout' => '@maddoger/admin/views/layouts/main.php',

    'components' => [

        //Admin
        'urlManager' => [
            'rules' => [
                //Admin
                //'<action:(index|login|logout|captcha|request-password-reset|reset-password|search|install)>' => 'admin/site/<action>',
            ]
        ],

        //User
//        'user' => [
//            'identityClass' => 'maddoger\admin\models\User',
//            'loginUrl' => ['admin/site/login'],
//            'enableAutoLogin' => true,
//            'on afterLogin'   => ['maddoger\admin\models\User', 'updateLastVisit'],
//            'on afterLogout'   => ['maddoger\admin\models\User', 'updateLastVisit'],
//        ],
//        'session' => [
//            'class' => 'yii\web\DbSession',
//            'sessionTable' => '{{%admin_session}}',
//        ],
//        'request' => [
//            'csrfParam' => '_csrfBackend',
//        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
];
