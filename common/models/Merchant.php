<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%merchant}}".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $mobile
 * @property string $email
 * @property string $legal_person
 * @property string $address
 * @property int $status
 * @property int $created_at
 * @property int $created_id
 * @property int $updated_at
 * @property int $updated_id
 */
class Merchant extends \yii\db\ActiveRecord
{
    const STATUS_OFF = 0;
    const STATUS_ON = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%merchant}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'created_at', 'created_id'], 'required'],
            [['status', 'created_at', 'created_id', 'updated_at', 'updated_id'], 'integer'],
            [['code'], 'string', 'max' => 8],
            [['name'], 'string', 'max' => 128],
            [['mobile'], 'string', 'max' => 20],
            [['email', 'address'], 'string', 'max' => 255],
            [['legal_person'], 'string', 'max' => 32],
            [['code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'legal_person' => 'Legal Person',
            'address' => 'Address',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_id' => 'Created ID',
            'updated_at' => 'Updated At',
            'updated_id' => 'Updated ID',
        ];
    }
}
