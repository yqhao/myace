<?php

namespace common\models;

use common\helpers\Helper;
use Yii;
use yii\web\Cookie;

/**
 * This is the model class for table "{{%dsn}}".
 *
 * @property int $id
 * @property int $merchant_code
 * @property string $host
 * @property string $port
 * @property string $dbname
 * @property string $username
 * @property string $password
 * @property string $new_password
 * @property string $salt
 */
class Dsn extends \yii\db\ActiveRecord
{
    public $new_password;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%dsn}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_code', 'host', 'port', 'dbname', 'username',], 'required'],
            [['merchant_code', 'host', 'port', 'dbname', 'username', 'new_password'], 'required','on'=>['create']],
            [['merchant_code', 'host', 'port', 'dbname', 'username', 'password'], 'required','on'=>['update']],
            [['merchant_code'], 'integer'],
            ['merchant_code', 'unique'],
            [['host'], 'string', 'max' => 128],
            [['port'], 'string', 'max' => 8],
            [['dbname'], 'string', 'max' => 24],
            [['username'], 'string', 'max' => 12],
            [['password','new_password'], 'string', 'max' => 256],
            [['salt'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'merchant_code' => 'Merchant Code',
            'host' => 'Host',
            'port' => 'Port',
            'dbname' => 'Dbname',
            'username' => 'Username',
            'password' => 'Password',
            'new_password' => 'New Password',
            'salt' => 'Salt',
        ];
    }

    public function generateSalt()
    {
        $this->salt = \common\helpers\Helper::generateSalt(32);
    }
    public function setPassword($password)
    {
        if(!$this->salt){
            $this->generateSalt();
        }
        $this->password = \common\helpers\Helper::authcode($password,'ENCODE',$this->salt);
    }

    public static function getByCode($merchantCode){
        return \Yii::$app->admin_db
            ->createCommand("SELECT merchant_code,host,port,dbname,username,password,salt FROM tb_dsn WHERE merchant_code=:code")
            ->bindValues([':code'=>$merchantCode])->queryOne();
    }
    
    public static function setComponentDb($dsn){
        $db = 'db'.$dsn['merchant_code'];
        $components = \Yii::$app->getComponents();
        $components[$db]['class'] = 'yii\db\Connection';
        $components[$db]['dsn'] = "mysql:host={$dsn['host']};port={$dsn['port']};dbname={$dsn['dbname']}";
        $components[$db]['username'] = $dsn['username'];
        $components[$db]['password'] = Helper::authcode($dsn['password'],'DECODE',$dsn['salt']);
        $components[$db]['charset'] = 'utf8';
        $components[$db]['tablePrefix'] = 'tb_';

        //var_dump($components['db']);exit;
        \Yii::$app->setComponents($components);
        \Yii::$app->dbSet = $dsn['merchant_code'];
        \Yii::$app->set('dbSet',$dsn['merchant_code']);
    }
}
