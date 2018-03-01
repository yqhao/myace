<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Dsn */

$this->title = 'Update Dsn: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Dsns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dsn-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
