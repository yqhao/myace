<?php

namespace common\commands;


use Yii;
use common\models\TimelineEvent;


/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class AddToTimelineCommand extends BaseCommandRunAsync
//class AddToTimelineCommand extends \yii\base\Object implements \trntv\bus\interfaces\SelfHandlingCommand
{
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
     * @param AddToTimelineCommand $command
     * @return bool
     */
    public function handle($command)
    {
        $model = new TimelineEvent();
        $model->application = Yii::$app->id;
        $model->category = $command->category;
        $model->event = $command->event;
        $model->data = json_encode($command->data, JSON_UNESCAPED_UNICODE);
        return $model->save(false);
    }
}
