<?php

namespace backend\controllers;

/**
 * Class KeyStorageItemController 键存储 执行操作控制器
 * @package backend\controllers
 */
class KeyStorageItemController extends Controller
{
    /**
     * @var string 定义使用的model
     */
    public $modelClass = 'common\models\KeyStorageItem';
     
    /**
     * 查询处理
     * @param  array $params
     * @return array 返回数组
     */
    public function where($params)
    {
        return [
            			'key' => '=', 
			'created_at' => '=', 

        ];
    }
}
