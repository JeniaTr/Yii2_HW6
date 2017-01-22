<?php
/**
 * Created by PhpStorm.
 * User: jeniatr
 * Date: 22.01.17
 * Time: 15:54
 */

namespace frontend\controllers;

use Yii;
use frontend\components\XMLSerializer;
use app\models\Tovar;
use app\models\SaveJsonXml;
use yii\helpers\Json;
use yii\helpers\FileHelper;
use yii\web\Controller;
use Codeception\Lib\Generator\Helper;
use yii\web\UploadedFile;

class CrawlerController extends Controller
{
    public function actionIndex()
    {
        $tovar = new Tovar();
        $model = new SaveJsonXml();
        $data = $tovar::find()->asArray()->all();
//        var_dump($data);
//        exit;

        if (1 == 1) {
            $model->saveJson($this->actionJson($data));
        }

        if (1 == 2) {
            $model->saveXml($this->actionXml($data));
        }

    }

    public function actionJson($data)
    {
//        $f= new FileHelper();
//        $r=$f::findFiles(__DIR__);
//        var_dump($r);
//        exit;
//        $sav= new SaveJsonXml();

        return Json::encode($data);
    }

    public function actionXml($data)
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