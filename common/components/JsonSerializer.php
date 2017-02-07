<?php

namespace common\components;


class JsonSerializer implements SerializerInterface
{

    /**
     * @param $array
     * @return string
     */
    public function encoded($array)
    {
        return json_encode($array);
    }

    /**
     * @param $array
     * @return mixed
     */
    public function decoded($array)
    {
        return json_decode($array);
    }
}