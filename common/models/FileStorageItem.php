<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%file_storage_item}}".
 *
 * @property integer $id
 * @property string $component
 * @property string $base_url
 * @property string $path
 * @property string $type
 * @property integer $size
 * @property string $name
 * @property string $upload_ip
 * @property integer $created_at
 */
class FileStorageItem extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%file_storage_item}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => false
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['component', 'path'], 'required'],
            [['size'], 'integer'],
            [['component', 'name', 'type'], 'string', 'max' => 255],
            [['path', 'base_url'], 'string', 'max' => 1024],
            [['type'], 'string', 'max' => 45],
            [['upload_ip'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'component' => Yii::t('common', 'Component'),
            'base_url' => Yii::t('common', 'Base Url'),
            'path' => Yii::t('common', 'Path'),
            'type' => Yii::t('common', 'Type'),
            'size' => Yii::t('common', 'Size'),
            'name' => Yii::t('common', 'Name'),
            'upload_ip' => Yii::t('common', 'Upload Ip'),
            'created_at' => Yii::t('common', 'Created At')
        ];
    }
    public static function afterSaveEvent($event)
    {
        $model = new FileStorageItem();
        $model->component = $event->sender->id;
        $model->path = $event->file['path'];
        $model->base_url = $event->file['baseUrl'];
        $model->size = $event->file['size'];
        $model->type = FileHelper::getMimeType(Yii::getAlias('@storageUpload').$event->file['path']);
        $model->name = pathinfo($event->file['title'], PATHINFO_FILENAME);
        if (Yii::$app->request->getIsConsoleRequest() === false) {
            $model->upload_ip = Yii::$app->request->getUserIP();
        }
        $model->save(false);
    }
}
