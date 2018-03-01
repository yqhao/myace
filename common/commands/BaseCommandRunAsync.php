<?php

namespace common\commands;

use trntv\bus\interfaces\BackgroundCommand;
use Yii;
use yii\base\Object;
use trntv\bus\interfaces\SelfHandlingCommand;


class BaseCommandRunAsync extends Object implements BackgroundCommand,SelfHandlingCommand
{
    /**
     * @var bool
     */
    protected $async = true;
    /**
     * @var bool
     */
    protected $runningInBackground = false;

    /**
     * @return bool
     */
    public function isAsync()
    {
        return $this->async;
    }
    /**
     * @param boolean $runningInBackground
     */
    public function setRunningInBackground($runningInBackground = true)
    {
        $this->runningInBackground = $runningInBackground;
    }

    /**
     * @param boolean $async
     */
    public function setAsync($async = true)
    {
        $this->async = $async;
    }

    /**
     * @return bool
     */
    public function isRunningInBackground()
    {
        return $this->runningInBackground;
    }
    /**
     * @var string
     */
    public $category;
    /**
     * @var string
     */
    public $event;
    /**
     * @var mixed
     */
    public $data;

    /**
     * @param  $command
     * @return bool
     */
    public function handle($command){

    }
}
