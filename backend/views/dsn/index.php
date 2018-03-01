<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\DsnlSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dsns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dsn-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('< 返回', ['dsn/index'], ['class' => 'btn bg-purple']) ?>
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'merchant_id',
            'host',
            'port',
            'dbname',
            //'username',
            //'password',
            //'salt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
