<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');



Yii::$container->set(\common\components\SerializerInterface::class, ['class' => \common\components\JsonSerializer::class, 'pathToSave' => '/tmp/xmlPath']);
Yii::$container->set('requestCrawler', [
    'class' => \common\components\RequestCrawler::class,
    'pathToSave' => '/file'
]);