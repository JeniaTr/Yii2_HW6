<?php

use yii\db\Migration;
use common\models\User;

class m170116_224104_create_newRollCild extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;

        $admins = $auth->getRole(User::ROLE_ADMIN);
        $creatPost = $auth->getPermission(User::PERMISION_CREATE_POST);

        $auth->addChild($admins, $creatPost);

    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $admins = $auth->getRole(User::ROLE_ADMIN);
        $creatPost = $auth->getPermission(User::PERMISION_CREATE_POST);

        $auth->removeChild($admins, $creatPost);

        echo "m170116_224104_create_newRollCild cannot be reverted.\n";

//        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
