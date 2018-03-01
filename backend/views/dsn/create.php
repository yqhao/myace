<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Dsn */

$this->title = 'Create Dsn';
$this->params['breadcrumbs'][] = ['label' => 'Dsns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dsn-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
