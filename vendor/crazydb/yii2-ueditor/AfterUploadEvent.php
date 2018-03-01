<?php
/**
 * Created by PhpStorm.
 * User: HowardPC
 * Date: 2018/2/2
 * Time: 15:02
 */

namespace crazydb\ueditor;
use yii\base\Event;

class AfterUploadEvent extends Event
{
    public $file;
}