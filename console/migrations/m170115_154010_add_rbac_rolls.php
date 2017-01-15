<?php

use yii\db\Migration;
use common\models\User;

class m170115_154010_add_rbac_rolls extends Migration
{
    public function up()
    {
        $auth = \Yii::$app->authManager;

        // Create user
        $user= $auth->createRole(User::ROLE_USER);
        $user->description='User role';
        $auth->add($user);


        // Create admin
        $admin= $auth->createRole(User::ROLE_ADMIN);
        $admin->description='Admin role';
        $auth->add($admin);

        // Add permission Create post
        $createPost= $auth->createPermission(User::PERMISION_CREATE_POST);
        $createPost->description='Create post';
        $auth->add($createPost);


    }

    public function down()
    {
        $auth = \Yii::$app->authManager;

        $user= $auth->getRole(User::ROLE_USER);
        $admin= $auth->getRole(User::ROLE_ADMIN);
        $createPost= $auth->getPermission(User::PERMISION_CREATE_POST);

        $auth->remove($user);
        $auth->remove($admin);
        $auth->remove($createPost);


        echo "Roles \n";

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
