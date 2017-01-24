<?php
/**
 * Created by PhpStorm.
 * User: jeniatr
 * Date: 22.01.17
 * Time: 15:54
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class CrawlerController extends Controller
{

    public function actionIndex (){
        //ServiceLocator
        Yii::$app->crawler->export();

    }


}