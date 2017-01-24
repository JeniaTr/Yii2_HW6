<?php
/**
 * Created by PhpStorm.
 * User: jeniatr
 * Date: 22.01.17
 * Time: 17:52
 */

namespace app\models;

use yii\web\UploadedFile;
use Yii;
use yii\base\Model;
use common\models\User;

class SaveFile extends Model
{
    public $fJson;

    public function save($path, $type, $data)
    {
//  открываем файл, если файл не существует,
//  делается попытка создать его
        $fp = fopen($path . "tovar." . $type, "w+");
//  записываем в файл текст
        fwrite($fp, $data);

//  закрываем
        fclose($fp);
    }
}