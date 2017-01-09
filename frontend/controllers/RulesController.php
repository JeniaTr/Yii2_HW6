<?php

namespace frontend\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class RulesController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    throw new \Exception('У вас нет доступа к этой странице');},
                'only' => ['about', 'logged', 'unlogged'],
                'rules' => [
                    [
                        'actions' => ['about'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                        return date('d-m') === '09-01';}
                    ],
                    [
                        'actions' => ['logged'],
                        'allow' => true,
                        'roles' => ['@'],
                        'denyCallback' => function ($rule, $action) { return $this->goBack(); },
                    ],
                    [
                        'actions' => ['unlogged'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
//            'denyCallback' => function ($rule, $action) {
//                throw new \Exception('У вас нет доступа к этой странице');
//            }
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogged()
    {
        return $this->render('logged');
    }

    public function actionUnlogged()
    {
        return $this->render('unlogged');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

}
