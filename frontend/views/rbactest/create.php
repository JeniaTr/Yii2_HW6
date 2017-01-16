<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rbactest */

$this->title = 'Create Rbactest';
$this->params['breadcrumbs'][] = ['label' => 'Rbactests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rbactest-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
