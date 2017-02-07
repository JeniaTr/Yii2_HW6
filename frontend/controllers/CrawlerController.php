<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class CrawlerController extends Controller
{

    public function actionIndex (){
        //ServiceLocator
        Yii::$app->crawler->export();
    }

    public function actionTest (){

        $requestCrawler = Yii::$container->get('requestCrawler');
        var_dump($requestCrawler);
        exit;

    }
   public function actionTest1 (){

       if($model->save()){
           $model->trigger(User::EVENT_NEW_USER);
       }
    }

}