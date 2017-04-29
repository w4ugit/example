<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'homeUrl' => '/admin/',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => '/admin',
        ],
        'user' => [
            'identityClass' => 'backend\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'load'=>'files/load',
                'delete-order'=>'site/delete-order',
                'liveedit'=>'site/ledit',
                'logout'=>'site/logout',
                'generate_box'=>'site/generate-box',
                'delete-files'=>'files/delete-files',
                'settings'=>'settings/index',
                'setting-save'=>'settings/setting-save',
                'seo'=>'seo/index',
                'ajax'=>'seo/ajax',
                'files'=>'files/show',
                'action/delete'=>'site/delete',
                'action/active'=>'site/active',
                'action/deactive'=>'site/deactive',
                '<table:\w+>'=>'base/index',
                '<table:\w+>/edit/<id:\d+>'=>'base/edit',
                '<table:\w+>/delete/<id:\d+>'=>'base/delete',
                '<table:\w+>/add'=>'base/add',
            ],
        ],
    ],
    'params' => $params,
];
