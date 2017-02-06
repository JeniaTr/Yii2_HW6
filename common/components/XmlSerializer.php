<?php

namespace common\components;

//use SimpleXMLElement;

class XmlSerializer implements SerializerInterface
{

    /**
     * @param $array
     * @return mixed
     */
    public function encoded($array)
    {
        $xml = new \SimpleXMLElement('<root/>');
        array_walk_recursive($data, function ($value, $key) use ($xml) {
            $xml->addChild($key, $value);
        });
        return $xml->asXML();
    }

    /**
     * @param $array
     * @return mixed
     */
    public function decoded($array)
    {
        $xml = simplexml_load_string($array);
        $json = json_encode($xml);
        return json_decode($json, true);
    }
}