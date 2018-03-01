<?php
/**
 * Yii2 Shortcuts
 * @author Eugene Terentev <eugene@terentev.net>
 * -----
 * This file is just an example and a place where you can add your own shortcuts,
 * it doesn't pretend to be a full list of available possibilities
 * -----
 */

/**
 * @return int|string
 */
function getMyId()
{
    return Yii::$app->user->getId();
}

/**
 * @param string $view
 * @param array $params
 * @return string
 */
function render($view, $params = [])
{
    return Yii::$app->controller->render($view, $params);
}

/**
 * @param $url
 * @param int $statusCode
 * @return \yii\web\Response
 */
function redirect($url, $statusCode = 302)
{
    return Yii::$app->controller->redirect($url, $statusCode);
}

/**
 * @param $form \yii\widgets\ActiveForm
 * @param $model
 * @param $attribute
 * @param array $inputOptions
 * @param array $fieldOptions
 * @return string
 */
function activeTextinput($form, $model, $attribute, $inputOptions = [], $fieldOptions = [])
{
    return $form->field($model, $attribute, $fieldOptions)->textInput($inputOptions);
}

/**
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function env($key, $default = null) {
    // 在windows getenv偶尔获取不了值
    $ary = [
        'II_DEBUG'   => false,
        'YII_ENV'     => 'dev',
        'PROJECT_NAME' => '后台管理系统',
        'PROJECT_TITLE' => '后台管理系统',
        'DB_DSN' => 'mysql:host=localhost;port=3306;dbname=general',
        'DB_USERNAME' => 'root',
        'DB_PASSWORD' => '123456',
        'DB_CHARSET' => 'utf8',
        'DB_TABLE_PREFIX' => 'tb_',
        'FRONTEND_HOST_INFO' => 'http://www.ace2.dev',
        'BACKEND_HOST_INFO' => 'http://admin.ace2.dev',
        'STORAGE_HOST_INFO' => 'http://storage.ace2.dev',
        'WEAPP_HOST_INFO' => 'http://weapp.ace2.dev',
        'BACKEND_COOKIE_VALIDATION_KEY' => 'tgYIwxREEUwnryVTC15-vU0sQPKIH7Co',
        'GLIDE_SIGN_KEY' => '6Y38T5JjRSpuAh6sCxwy4FqAZdPzMerG',
        'GLIDE_MAX_IMAGE_SIZE' => '4000000',
        'SMTP_HOST' => 'mailcatcher',
        'SMTP_PORT' => '1025',
        'ADMIN_EMAIL' => 'ikon22@sina.com',
        'ROBOT_EMAIL' => 'ikon22@sina.com',
    ];
//    $value = isset($ary[$key]) ? $ary[$key] : null;
    $value = getenv($key);

    if ($value === false) {
        return $default;
    }

    switch (strtolower($value)) {
        case 'true':
        case '(true)':
            return true;

        case 'false':
        case '(false)':
            return false;
    }

    return $value;
}


function switchEnv(){
    if($_SERVER['REQUEST_URI'] == '/site/login'){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $merchantCode = $_POST['AdminForm']['merchantCode'];
            return '.env.'.$merchantCode;
        }
    }else{
        if(isset($_COOKIE['merchant'])){
            $merchant = unserialize(substr($_COOKIE['merchant'],64));
            $value = json_decode($merchant[1],true);
            return '.env.'.$value['code'];
        }
    }
    return '.env.default';
}