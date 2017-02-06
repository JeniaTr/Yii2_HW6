<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [

        'requestCrawler' => common\components\service\RequestCrawlerServiceBuilder::build(
            [
                'class' => 'common\XmlSerializer',
                'pathToSave' => '/tmp/common/file'
            ],
            '/tmp/'
        ),

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
