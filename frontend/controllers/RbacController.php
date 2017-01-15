<?php
/**
 * Created by PhpStorm.
 * User: jeniatr
 * Date: 15.01.17
 * Time: 18:55
 */

namespace frontend\controllers;


use yii\web\Controller;
use yii;
use common\models\User;
//use yii\filters\AccessControl;


class RbacController extends Controller
{
    public function actionUseradd()
    {
        $auth = \Yii::$app->authManager;
        // Create user
        $user = $auth->createRole(User::ROLE_USER);
        $auth->add($user);
    }

    public function actionRem()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

    }

            public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();


        // добавляем разрешение "createPost"
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // добавляем разрешение "updatePost"
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        // добавляем роль "author" и даём роли разрешение "createPost"
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);

        // добавляем роль "admin" и даём роли разрешение "updatePost"
        // а также все разрешения роли "author"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);

        // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
    }


}