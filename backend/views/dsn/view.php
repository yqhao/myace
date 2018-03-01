<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Dsn */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dsns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dsn-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('< 返回', ['index'], ['class' => 'btn bg-purple']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'merchant_id',
            'host',
            'port',
            'dbname',
            'username',
            'password',
            'salt',
//            [
//                'attribute' => 'password',
//                'format' => 'raw',
//                'value' => function ($model) {
//                    return \common\helpers\Helper::authcode($model->password,'DECODE',$model->salt);
//                }
//            ],
        ],
    ]) ?>

</div>
