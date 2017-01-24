<?php
/**
 * Created by PhpStorm.
 * User: jeniatr
 * Date: 24.01.17
 * Time: 23:56
 */

namespace frontend\components;

use app\models\Tovar;
use app\models\SaveFile;
use yii\helpers\Json;

class RequestCrawler
{

    public $path;
    public $type;


    public function export ()
    {
        $table = new Tovar();
        $model = new SaveFile();

        $data = $table::find()->asArray()->all();
//        var_dump($data);
//        exit;

        if ('JSON' == $this->type) {
            $model->save($this->path, $this->type, $this->enJson($data));
        }

        if ('XML' == $this->type) {
            $model->save($this->path, $this->type, $this->enXml($data));
        }

    }

    private function enJson($data)
    {
//        $f= new FileHelper();
//        $r=$f::findFiles(__DIR__);
//        var_dump($r);
//        exit;
//        $sav= new SaveJsonXml();

        return Json::encode($data);
    }

    private function enXml($data)
    {
//        $t= Json::encode($data);
//        $r = new \SimpleXMLElement($t);
//        $a = $r->asXML();

        $xml = new \SimpleXMLElement('<root/>');
//        $var=array_flip($data);
        array_walk_recursive($data, function ($value, $key) use ($xml) {
            $xml->addChild($key, $value);
        });
//        array_walk_recursive($data, array($xml, 'addChild'));

        return $xml->asXML();
    }

}