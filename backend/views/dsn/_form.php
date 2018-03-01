<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Dsn */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dsn-form">
    <p><?= Html::a('< 返回', ['index'], ['class' => 'btn bg-purple']) ?></p>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'merchant_id')->textInput() ?>

    <?= $form->field($model, 'host')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'port')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dbname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'new_password')->passwordInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
