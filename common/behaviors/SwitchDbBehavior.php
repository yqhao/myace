<?php

namespace common\behaviors;

use common\helpers\Helper;
use common\models\Dsn;
use yii\base\Behavior;
use Yii;
use yii\base\Controller;
use yii\base\Exception;
use yii\web\Application;

/**
 * Class LocaleBehavior
 * @package common\behaviors
 */
class SwitchDbBehavior extends Behavior
{
    /**
     * @var string
     */

    public $exceptActions = [
        'site/login'
    ];

    /**
     * @var bool
     */
    public $enablePreferredLanguage = true;
    /**
     * @return array
     */
    public function events()
    {
        return [
//            Application::EVENT_BEFORE_REQUEST => 'beforeRequest',
            Controller::EVENT_BEFORE_ACTION => 'beforeAction'
        ];
    }

    protected function inControl(){
        $route = strtolower(Yii::$app->controller->id.'/'.Yii::$app->controller->action->id);
        if(in_array($route,$this->exceptActions) || in_array(strtolower(Yii::$app->controller->id.'/*'),$this->exceptActions)){
            return false;
        }
        return true;
    }
    /**
     * Resolve application language by checking user cookies, preferred language and profile settings
     */
    public function beforeAction()
    {
//        if($this->inControl() && !Yii::$app->user->isGuest){
        if($this->inControl()){
            if(!Yii::$app->user->isGuest){
                $code = \Yii::$app->user->identity->merchant_code;
            }else{
                $code = Yii::$app->request->get('mc');
            }
//            $code = \Yii::$app->user->identity->merchant_code;
            if(!$code){
                throw new Exception('account\'s merchant_code could not be empty.');
            }
            $dsn = Dsn::getByCode($code);
            if (empty($dsn)) {
                throw new Exception('dsn could not be empty.');
            }
            Dsn::setComponentDb($dsn);
        }
        return true;
    }

}
