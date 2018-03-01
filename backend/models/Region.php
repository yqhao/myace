<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%region}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $province
 * @property string $city
 * @property string $county
 * @property string $Longitude
 * @property string $latitude
 * @property string $type
 * @property integer $depth
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%region}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'depth'], 'integer'],
            [['name', 'province', 'city', 'county'], 'string', 'max' => 100],
            [['Longitude', 'latitude'], 'string', 'max' => 20],
            [['type'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'province' => 'Province',
            'city' => 'City',
            'county' => 'County',
            'Longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'type' => 'Type',
            'depth' => 'Depth',
        ];
    }
}
