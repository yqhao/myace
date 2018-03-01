<?php

namespace backend\controllers;

class FileManagerController extends \common\controllers\UserController
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => ['class' => 'yii\web\ErrorAction'],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index');
    }
}
