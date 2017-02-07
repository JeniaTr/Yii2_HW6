<?php
/**
 * Created by PhpStorm.
 * User: jeniatr
 * Date: 24.01.17
 * Time: 23:56
 */

namespace frontend\components;

use Yii;
use app\models\Tovar;
use app\models\SaveFile;
use yii\helpers\Json;

class RequestCrawler
{

    public $path;
    public $type;


    public function export()
    {
        $table = new Tovar();
        $model = new SaveFile();
        $fileName = $table::tableName();
        $data = $table::find()->asArray()->all();

        if ('JSON' == $this->type) {
            $model->save($this->path, $this->type, $fileName, $this->enJson($data));
            Yii::info('JSON data upload','fff');

        }

        if ('XML' == $this->type) {
            $model->save($this->path, $this->type, $fileName, $this->enXml($data));
            Yii::info('xml data upload','fff');
        }

    }

    private function enJson($data)
    {
//        $f= new FileHelper();
//        $r=$f::findFiles(__DIR__);
//        var_dump($r);
//        exit;

        return Json::encode($data);
    }

    private function enXml($data)
    {

        $xml = new \SimpleXMLElement('<root/>');
        array_walk_recursive($data, function ($value, $key) use ($xml) {
            $xml->addChild($key, $value);
        });

        return $xml->asXML();
    }

}