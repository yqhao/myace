<?php

namespace common\commands;


use common\models\TimelineEvent;
use trntv\bus\interfaces\QueuedCommand;
use trntv\bus\interfaces\SelfHandlingCommand;
use trntv\bus\middlewares\QueuedCommandTrait;
use Yii;
use yii\base\Object;

class QueueTestCommand extends Object implements QueuedCommand, SelfHandlingCommand
{
    use QueuedCommandTrait;
//    public $queueName = 'queue-test';
//    public $delay = 5; // Command will be delayed for 5 seconds
    public function handle($command)
    {
        $t = time();
        //sleep(60);
        $model = new TimelineEvent();
        $model->application = 'xxx';
        $model->category = 'xxx';
        $model->event = 'xxx';
        $model->data = date("Y-m-d H:i:s",$t).'--'.date("Y-m-d H:i:s");
        return $model->save(false);
    }
}
