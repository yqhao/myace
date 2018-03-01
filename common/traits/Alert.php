<?php


namespace common\traits;

use yii;

/**
 * Trait Json
 * @package common\traits
 */
trait Alert
{
    /**
     * 处理成功返回
     *
     * @param string $message
     * @return mixed|string
     */
    protected function AlertSuccess($message = '')
    {
        \Yii::$app->session->setFlash('alert', [
            'body'=>$message,
            'options'=>['class'=>'alert-success']
        ]);
    }

    /**
     * 处理错误返回
     *
     * @param string $message
     * @return mixed|string
     */
    protected function AlertError($message = '')
    {
        \Yii::$app->session->setFlash('alert', [
            'body'=>$message,
            'options'=>['class'=>'alert-success']
        ]);
    }


}