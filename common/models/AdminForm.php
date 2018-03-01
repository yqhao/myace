<?php
namespace common\models;

use common\helpers\Helper;
use Yii;
/**
 * Login form
 */
class AdminForm extends \yii\base\Model
{
    public $merchantCode;
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['merchantCode','username', 'password'], 'required'],
            ['merchantCode', 'validateMerchantCode'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'merchantCode'   => '商户号ID',
            'username'   => '管理员账号',
            'password'   => '管理员密码',
            'rememberMe' => '记住登录',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('app', 'Incorrect username or password.'));
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }
    public function setLoginCookieMerchant(){
        $cookieDsn = Yii::createObject([
            'name' => 'merchant',
            'httpOnly' => true,
            'class' => 'yii\web\Cookie',
            'value' => json_encode(['code'=>$this->merchantCode]),
            'expire' => time() + ($this->rememberMe ? 3600 * 24 * 30 : 0),
        ]);
        Yii::$app->getResponse()->getCookies()->add($cookieDsn);
    }
    public static function removeLoginCookieMerchant(){
        $cookieDsn = Yii::createObject([
            'name' => 'merchant',
            'httpOnly' => true,
            'class' => 'yii\web\Cookie'
        ]);
        Yii::$app->getResponse()->getCookies()->remove($cookieDsn);
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
        
            $this->_user = Admin::findByUsername($this->username);
        }
        return $this->_user;
    }

    public function validateMerchantCode($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $merchant = \Yii::$app->admin_db
//            $merchant = \Yii::$app->db
                ->createCommand("SELECT id,code,status FROM tb_merchant WHERE code=:code")
                ->bindValues([':code'=>$this->merchantCode])->queryOne();
            if(empty($merchant)){
                $this->addError($attribute, '商户不存在');
                return false;
            }
            if($merchant['status'] != Merchant::STATUS_ON){
                $this->addError($attribute, '商户状态异常');
                return false;
            }

//            $dsn = Dsn::getByCode($this->merchantCode);
//            if (empty($dsn)) {
//                $this->addError($attribute, Yii::t('app', 'dsn could not be empty.'));
//                return false;
//            }
//
//            Dsn::setComponentDb($dsn);

            return true;
        }
    }
}
