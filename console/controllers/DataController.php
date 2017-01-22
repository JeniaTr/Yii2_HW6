<?php

namespace console\controllers;

//namespace app\models;

use yii;
use app\models\Tovar;
use yii\console\Controller;
use yii\helpers\Console;
use yii\helpers\FileHelper;

class DataController extends Controller
{
    public $message;

    public function options()
    {
        return [];
    }

    public function optionAliases()
    {
        return [];
    }

// RUN php yii datas
    public function actionIndex()
    {
        $result = $this->prompt("запуск прогресс бара: ");
        if ($result == "y" or $result == "yes") {
            Console::startProgress(0, 100);
            foreach (range(0, 100) as $v) {
//                usleep(10000);
/////////////////////////////////////////

                $db = Yii::$app->db;
                $transaction = $db->beginTransaction();

                try {
                    for ($i = 1; $i <= 10; $i++) {
                        $db->createCommand()->insert('tovar', [
                            'name' => Yii::$app->getSecurity()->generateRandomString(10),
                        ])->execute();
                    }

                    $transaction->commit();
                } catch (\Exception $e) {
                    $transaction->rollBack();
                    throw $e;
                } catch (\Throwable $e) {
                    $transaction->rollBack();
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