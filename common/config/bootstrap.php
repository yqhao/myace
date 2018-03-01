<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@storage', dirname(dirname(__DIR__)) . '/storage');
Yii::setAlias('@storageUpload', dirname(dirname(__DIR__)) . '/storage/web');
Yii::setAlias('@weapp', dirname(dirname(__DIR__)) . '/weapp');

Yii::setAlias('@frontendUrl', env('FRONTEND_HOST_INFO') . env('FRONTEND_BASE_URL'));
Yii::setAlias('@backendUrl', env('BACKEND_HOST_INFO') . env('BACKEND_BASE_URL') );
Yii::setAlias('@storageUrl', env('STORAGE_HOST_INFO') . env('STORAGE_BASE_URL'));
Yii::setAlias('@weappUrl', env('WEAPP_HOST_INFO') . env('WEAPP_BASE_URL'));
