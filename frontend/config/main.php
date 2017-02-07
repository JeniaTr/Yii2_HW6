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
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],

        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [

            'flushInterval' => 1,   // по умолчанию 1000
            'traceLevel' => YII_DEBUG ? 3 : 0,

            'targets' => [

                'file' => [
                    'class' => 'yii\log\FileTarget',
                ],
                'db' => [
                    'class' => 'yii\log\DbTarget',
                ],

                ['class' => 'yii\log\FileTarget',
                    'exportInterval' => 1,
                    'levels' => ['info'],
                    'categories' => ['fff'],
                    'logFile' => '@frontend/runtime/logs/Log11111.log',
                    'logVars' => ['_GET', '_POST', '_FILES'],
                ],

                [
                    'class' => 'yii\log\FileTarget',
                    'exportInterval' => 1,  // по умолчанию 1000
                ],
                [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                ],

                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],

                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'categories' => [
                        'yii\db\*',
                        'yii\web\HttpException:*',
                    ],
                    'except' => [
                        'yii\web\HttpException:404',
                    ],
                ],

                [
                    'class' => 'yii\log\FileTarget',
                    'prefix' => function ($message) {
                        $user = Yii::$app->has('user', true) ? Yii::$app->get('user') : null;
                        $userID = $user ? $user->getId(false) : '-';
                        return "[$userID]";
                    }
                ],

            ],
        ],


        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'class' => 'frontend\components\LangUrlManager',
            'rules' => [
                '/' => 'site/index',
                '<controller:\w+>/<action:\w+>/*' => '<controller>/<action>',
            ]
        ],

        'request' => [
            'class' => 'frontend\components\LangRequest'
        ],

        'language' => 'ru-RU',
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        //'main' => 'main.php',
                    ],
                ],
            ],
        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
//ServiceLocator
        'crawler' => [
            'class' => 'frontend\components\RequestCrawler',
            'path' => 'files/',
//            'type' => 'XML'
            'type' => 'JSON'
        ],

    ],
    'params' => $params,
];
