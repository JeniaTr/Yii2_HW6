<?php
namespace common\service;
use Closure;
use \common\components\SerializerInterface;

class RequestCrawlerServiceBuilder
{
    /**
     * @param $serializerConfig
     * @param $pathToSave
     * @return Closure
     * @internal param $serializerType
     * @internal param SerializerInterface $serializer
     * @internal param string $filePath
     * @internal param $ip
     */
    public static function build($serializerConfig, $pathToSave)
    {
        return function () use ($serializerConfig, $pathToSave) {
            $serializer = \Yii::createObject($serializerConfig);
            $requestCrawler = new \common\components\RequestCrawler($serializer, ['pathToSave' => $pathToSave]);
            return $requestCrawler;
        };
    }
}