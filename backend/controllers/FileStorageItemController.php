<?php

namespace backend\controllers;

/**
 * Class FileStorageItemController 文件仓库 执行操作控制器
 * @package backend\controllers
 */
class FileStorageItemController extends Controller
{
    /**
     * @var string 定义使用的model
     */
    public $modelClass = 'common\models\FileStorageItem';
     
    /**
     * 查询处理
     * @param  array $params
     * @return array 返回数组
     */
    public function where($params)
    {
        return [
            			'component' => '=', 
			'type' => '=', 
			'created_at' => '=', 

        ];
    }
}
