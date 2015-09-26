<?php
return [
    'components' => [
        'cache' => [
            'class' => 'yii\caching\MemCache',
            'servers' => [
                [
                    'host' => '127.0.0.1',
                    'port' => 11211,
                ],
            ],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=syrchikov_name',
            'username' => 'syrchikov_name',
            'password' => 'ze0xeiDu',
            'charset' => 'utf8',
            //'tablePrefix' => 'tbl_',
            'enableSchemaCache' => true,
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
    ],
];
