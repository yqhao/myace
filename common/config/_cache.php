<?php

return [
    'components' => [
        //命令总线
        'commandBus' => [
            'class' => 'trntv\bus\CommandBus',
            'middlewares' => [
                [
                    'class' => '\trntv\bus\middlewares\BackgroundCommandMiddleware',
                    //后台执行:异步用console实现,需要继承BaseCommandRunAsync,否则后台直接执行
                    'backgroundHandlerBinary' => 'C:\wamp64\bin\php\php7.0.0\php.exe',
                    'backgroundHandlerPath' => '@console/yii',
                    'backgroundHandlerRoute' => 'command-bus/handle',
                ]
            ]
        ],
        'commandBusQueued' => [
            'class' => 'trntv\bus\CommandBus',
            'middlewares' => [
                [
                    'class' => '\trntv\bus\middlewares\QueuedCommandMiddleware',
                    // 'defaultQueueName' => 'commands-queue', // You can set default queue name
                    'delay' => 5, // You can set default delay for all commands here
                ]
            ]
        ],
        //队列
        'queue' => [
            'class' => \yii\queue\redis\Queue::class,
            'as log' => \yii\queue\LogBehavior::class,
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname'   => '127.0.0.1',
            'port'   => '6379',
            'password' => '112233'
        ],

        // 缓存配置
        'apcCache' => [
            'class' => 'yii\caching\ApcCache',
            'keyPrefix' => 'apcu_',
            'useApcu' => true,
            'defaultDuration' => 7200,
        ],
        'cache' => [
            'class' => 'yii\caching\ApcCache',
            'keyPrefix' => 'cm_',
            'useApcu' => true,
            'defaultDuration' => 7200,
        ],
        'queryCache' => [
            'class' => 'common\components\queryCache\QueryCache'
        ],
        'fileStorage' => [
            'class' => '\trntv\filekit\Storage',
            'baseUrl' => '@storageUrl/source',
            'filesystem' => [
                'class' => 'common\components\filesystem\LocalFlysystemBuilder',
                'path' => '@storage/web/source'
            ],
            'as log' => [
                'class' => 'common\behaviors\FileStorageLogBehavior',
                'component' => 'fileStorage'
            ]
        ],
        'keyStorage' => [
            'class' => 'common\components\keyStorage\KeyStorage'
        ],

    ],
];
