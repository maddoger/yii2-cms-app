<?php

return [
    'id' => 'app-frontend',
    'name' => 'Yii2 CMS Application',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
    ],

    'components' => [
        'urlManager' => [
//            'enableStrictParsing' => true,
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,

            'rules' => [

            ]
        ],
//        'session' => [
//            'class' => 'yii\web\DbSession',
//            'sessionTable' => '{{%admin_session}}',
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
