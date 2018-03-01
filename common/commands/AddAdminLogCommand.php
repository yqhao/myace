<?php

namespace common\commands;

use Yii;

class AddAdminLogCommand extends BaseCommandRunAsync
{

    /*  @var $model \backend\models\AdminLog */
    public $model;

    /**
     * @param AddAdminLogCommand $command
     * @return bool
     */
    public function handle($command)
    {
        return $command->model->save(false);
    }
}
