<?php

return [
    'id' => 'app-backend',
    'name' => 'Yii2 CMS',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'admin',
        function(){
            return Yii::$app->getModule('user');
        }
    ],
    'controllerNamespace' => 'backend\controllers',
    //'language' => 'ru-RU',

    'modules' => [
        'admin' => [
            'class' => 'maddoger\admin\Module',
            //'sidebarMenuCache' => false,
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
                '<action:(index|captcha|search)>' => 'admin/site/<action>',
                '<controller:(log|system-information|configuration)>/<action:(index|captcha|search)>' => 'admin/<controller>/<action>',
                //User
                '<action:(login|logout|request-password-reset|reset-password)>' => 'user/auth/<action>',
                'profile' => 'user/user/profile',
            ]
        ],

        //User
        'user' => [
            'identityClass' => 'maddoger\user\common\models\User',
            'loginUrl' => ['user/auth/login'],
            'enableAutoLogin' => true,
            'on afterLogin'   => ['maddoger\user\common\models\User', 'updateLastVisit'],
            'on afterLogout'   => ['maddoger\user\common\models\User', 'updateLastVisit'],
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
