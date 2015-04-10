<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'flushInterval' => 1,
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['trace', 'error', 'warning'],
                    'exportInterval' => 1,
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        // 'view' => [
        //     'theme' => [
        //         'pathMap' => ['@frontend/views' => '@frontend/themes/unify'],
        //         'baseUrl' => '@web/themes/unify',
        //     ],
        // ],
    ],
    'params' => $params,
];
