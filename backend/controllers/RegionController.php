<?php

namespace backend\controllers;

/**
 * Class RegionController 地区 执行操作控制器
 * @package backend\controllers
 */
class RegionController extends Controller
{
    /**
     * @var string 定义使用的model
     */
    public $modelClass = 'backend\models\Region';
     
    /**
     * 查询处理
     * @param  array $params
     * @return array 返回数组
     */
    public function where($params)
    {
        return [
            			'id' => '=', 
			'parent_id' => '=', 
			'name' => '=', 
			'province' => '=', 
			'depth' => '=', 

        ];
    }
}
