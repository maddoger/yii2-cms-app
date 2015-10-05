<?php

return [
    'id' => 'app-backend',
    'name' => 'Yii2 CMS',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'admin', 'user'],
    'controllerNamespace' => 'backend\controllers',
    //'language' => 'ru-RU',

    'modules' => [
        'admin' => [
            'class' => 'maddoger\admin\Module',
            'sidebarMenuCache' => false,
            'logoText' => 'Yii2 CMS',
            //'superUserId' => 1,
            //'sortNumber' => 11
        ],
        'user' => [
            'class' => 'maddoger\user\backend\Module',
            'guestLayout' => '@maddoger/admin/views/layouts/minimal.php',
            //'superUserId' => 1,
            //'sortNumber' => 11
        ],
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
    'defaultRoute' => 'admin/site/index',
    'layout' => '@maddoger/admin/views/layouts/main.php',

    'components' => [

        //Admin
        'urlManager' => [
            'rules' => [
                //Admin
                //'<action:(index|login|logout|captcha|request-password-reset|reset-password|search|install)>' => 'admin/site/<action>',
            ]
        ],

        //User
        'user' => [
            'identityClass' => 'maddoger\user\common\models\User',
            'loginUrl' => ['user/auth/login'],
            'enableAutoLogin' => true,
            //'on afterLogin'   => ['maddoger\admin\models\User', 'updateLastVisit'],
            //'on afterLogout'   => ['maddoger\admin\models\User', 'updateLastVisit'],
        ],
        'session' => [
            'class' => 'yii\web\DbSession',
            'sessionTable' => '{{%user_session}}',
        ],
        'request' => [
            'csrfParam' => '_csrfBackend',
        ],

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
            'errorAction' => 'admin/site/error',
        ],
    ],
];
