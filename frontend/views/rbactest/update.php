<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rbactest */

$this->title = 'Update Rbactest: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Rbactests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rbactest-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
