<?php
return [
    'timeZone' => 'Europe/Samara',
    'language' => 'ru-RU',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        /*'i18n' => [
            'class' => 'maddoger\core\i18n\I18N',
            'availableLanguages' => [
                [
                    'slug' => 'ru',
                    'locale' => 'ru-RU',
                    'name' => 'Русский',
                ],
            ],
        ],*/
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        /*'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'itemFile' => '@common/rbac/items.php',
            'assignmentFile' => '@common/rbac/assignments.php',
            'ruleFile' => '@common/rbac/rules.php',
        ],
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy',
            'datetimeFormat' => 'dd.MM.yyyy HH:mm',
            'timeFormat' => 'HH:mm',
        ],*/
        'assetManager' => [
            'linkAssets' => true,
            'appendTimestamp' => true,
        ],
    ],
];
