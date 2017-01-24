<?php
/**
 * Created by PhpStorm.
 * User: jeniatr
 * Date: 22.01.17
 * Time: 17:52
 */

namespace app\models;

use yii\base\Model;

class SaveFile extends Model
{
    public $fJson;

    public function save($path, $type, $name, $data)
    {
//  открываем файл, если файл не существует,
//  делается попытка создать его
        $fp = fopen($path . $name . "." . $type, "w+");
//  записываем в файл текст
        fwrite($fp, $data);

//  закрываем
        fclose($fp);
    }
}