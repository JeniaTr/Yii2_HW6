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

class SaveJsonXml extends Model
{
    public $fJson;

    public function saveJson($data)
    {
//  открываем файл, если файл не существует,
//  делается попытка создать его
        $fp = fopen("files/"."tovar."."json", "w+");
//  записываем в файл текст
        fwrite($fp, $data);

//  закрываем
        fclose($fp);
    }
    public function saveXml($data)
    {
//  открываем файл, если файл не существует,
//  делается попытка создать его
        $fp = fopen("files/"."tovar.xml", "w+");
//  записываем в файл текст
        fwrite($fp, $data);

//  закрываем
        fclose($fp);
    }
}