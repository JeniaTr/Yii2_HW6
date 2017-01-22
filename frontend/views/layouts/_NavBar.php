<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

NavBar::begin([
    'brandLabel' => 'JeniaTr',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);

$a = Yii::$app->controller->getRoute();
$b = stristr($a, '/', true);
//    var_dump($b);die();

if ($b == 'site') {
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
        ['label' => 'Rules', 'url' => ['/rules/']],
        ['label' => 'Rbactest', 'url' => ['/rbactest/']],

    ];
}

if ($b == 'rbactest') {
    $menuItems = [
        ['label' => 'about', 'url' => ['/rbactest/about']],
        ['label' => 'create', 'url' => ['/rbactest/create']],
        ['label' => 'index', 'url' => ['/rbactest/index']],
//        ['label' => 'view', 'url' => ['/rbactest/view']],
//        ['label' => '_search', 'url' => ['/rbactest/_search']],
//        ['label' => '_form', 'url' => ['/rbactest/_form']],

    ];
}


if ($b == "rules") {
    $menuItems = [
        ['label' => 'Main', 'url' => ['/rules/']],
        ['label' => 'About', 'url' => ['/rules/about']],
        ['label' => 'logged', 'url' => ['/rules/logged']],
        ['label' => 'unlogged', 'url' => ['/rules/unlogged']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Yo are the gest'];
    } else {
        $menuItems[] = ['label' => Yii::$app->user->identity->username];
    };

}


if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => Yii::t('app', 'Sign'), 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout']
        )

        . Html::endForm()
        . '</li>';
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);
NavBar::end();