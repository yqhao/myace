<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','queue'],
    'controllerNamespace' => 'console\controllers',
    'controllerMap' => [
        'command-bus' => [
            'class' => 'console\controllers\BackgroundBusBaseController',
        ],
        'queue-bus' => [
            'class' => '\trntv\bus\console\QueueBusController'
        ]
    ],
    'components' => [
        // 权限管理
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params' => $params,
];
