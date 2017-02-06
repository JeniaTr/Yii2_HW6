<?php

namespace common\components;


interface SerializerInterface
{
    /**
     * @param $array
     * @return mixed
     */
    public function encoded($array);

    /**
     * @param $array
     * @return mixed
     */
    public function decoded($array);
}