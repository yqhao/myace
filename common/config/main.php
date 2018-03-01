<?php
$config =  [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        // 数据库配置
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => env('DB_DSN'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'charset' => env('DB_CHARSET'),
            'tablePrefix' => env('DB_TABLE_PREFIX'),
        ],
        'admin_db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;port=3306;dbname=general',
            'username' => 'root',
            'password' => '123456',
            'charset' => 'utf8',
            'tablePrefix' => 'tb_',
        ],
        'glide' => [
            'class' => 'trntv\glide\components\Glide',
            'sourcePath' => '@storage/web/source',
            'cachePath' => '@storage/cache',
            'urlManager' => 'urlManagerStorage',
            'maxImageSize' => env('GLIDE_MAX_IMAGE_SIZE'),
            'signKey' => env('GLIDE_SIGN_KEY')
        ],
        // 多语言配置
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
    ],
];
;
return yii\helpers\ArrayHelper::merge(
    $config,
    require(__DIR__ . '/_cache.php'),
    require(__DIR__ . '/_mailer.php'),
    require(__DIR__ . '/_log.php')
);
