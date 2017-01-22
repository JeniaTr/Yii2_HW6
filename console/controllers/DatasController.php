<?php

namespace console\controllers;

use yii;
use app\models\Tovar;
use yii\console\Controller;
use yii\helpers\Console;
use yii\helpers\FileHelper;
use yii\db\ActiveRecord;

class DatasController extends Controller
{
    public $tov;

    public function options()
    {
        return [];
    }

    public function optionAliases()
    {
        return [];
    }

    public function actionIndex()
    {
        $result = $this->prompt("запуск прогресс бара: ");
        if ($result == "y" or $result == "yes") {
            Console::startProgress(0, 100);
            foreach (range(0, 100) as $v) {
//usleep(10000);
/////////////////////////////////////////

                for ($i = 1; $i <= 10; $i++) {
                    $tov = new Tovar();
                    $r = Yii::$app->getSecurity()->generateRandomString(10);
                    $tov->name = "$r";
                    $tov->save();
                }
/////////////////////////////////////////
                Console::updateProgress($v, 100);
            }
            Console::endProgress("end" . PHP_EOL);
        } else {
            echo 'Вы ввели неверную команду!';
        }
        return parent::EXIT_CODE_NORMAL;

    }

}