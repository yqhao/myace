<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id'         => 'app-backend',
    'name'       => 'Yii2 Admin',
    'basePath'   => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap'  => ['log'],
    'modules'    => [],
    'language'   => 'zh-CN',
    'controllerMap' => [
        'file-manager-elfinder' => [
            'class' => mihaildev\elfinder\Controller::class,
//            'access' => ['manager'],
            'disabledCommands' => ['netmount'],
            'roots' => [
                [
                    'baseUrl' => '@storageUrl',
                    'basePath' => '@storageUpload',
                    'path' => '/',
//                    'access' => ['read' => 'manager', 'write' => 'manager']
                ]
            ]
        ],
        'ueditor' => [
            /** @var crazydb\ueditor\UEditorController **/
            'class' => 'crazydb\ueditor\UEditorController',
            'thumbnail' => ['height' => 60, 'width' => 60],//如果将'thumbnail'设置为空，将不生成缩略图。
            'watermark' => [    //默认不生存水印
                'path' => '/source/ss.jpg', //水印图片路径
                'position' => 9 //position in [1, 9]，表示从左上到右下的 9 个位置，即如1表示左上，5表示中间，9表示右下。
            ],
//            'zoom' => ['height' => 500, 'width' => 500], //缩放，默认不缩放
            'config' => [
                'baseUrl' => 'http://storage.ace2.dev',
                //server config @see http://fex-team.github.io/ueditor/#server-config
                'imagePathFormat' => '/source/image/{yyyy}{mm}{dd}/{time}{rand:6}',
                'scrawlPathFormat' => '/source/image/{yyyy}{mm}{dd}/{time}{rand:6}',
                'snapscreenPathFormat' => '/source/image/{yyyy}{mm}{dd}/{time}{rand:6}',
                'catcherPathFormat' => '/source/image/{yyyy}{mm}{dd}/{time}{rand:6}',
                'videoPathFormat' => '/source/video/{yyyy}{mm}{dd}/{time}{rand:6}',
                'filePathFormat' => '/source/file/{yyyy}{mm}{dd}/{rand:4}_{filename}',
                'imageManagerListPath' => '/source/image/',
                'fileManagerListPath' => '/source/file/',
            ],
            'on afterUpload' => ['\common\models\FileStorageItem','afterSaveEvent'],
        ]
    ],
    'components' => [
        // 权限管理
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],

        // 资源管理修改
        'assetManager' => [
            'bundles' => [
                // 去掉自己的bootstrap 资源
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => []
                ],
                // 去掉自己加载的Jquery
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'js' => [],
                ],
            ],
        ],
        'request' => [
            'cookieValidationKey' => env('BACKEND_COOKIE_VALIDATION_KEY'),
            'baseUrl' => env('BACKEND_BASE_URL')
        ],
        // 图片处理
        'image' => [
            'class'  => 'yii\image\ImageDriver',
            'driver' => 'GD'
        ],

        // 用户信息
        'user' => [
            'identityClass'   => 'common\models\Admin',
            'enableAutoLogin' => true,
        ],

        // 错误页面
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        // 路由配置
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
    ],

    'params' => $params,
];