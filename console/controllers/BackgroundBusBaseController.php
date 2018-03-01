<?php
namespace console\controllers;
use trntv\bus\console\BackgroundBusController;

/**
 * Class BackgroundBusController
 * @package trntv\bus\console
 * @author Eugene Terentev <eugene@terentev.net>
 */
class BackgroundBusBaseController extends BackgroundBusController
{

    /**
     * @param string $command serialized command object
     * @return string
     */
    public function actionHandle($command)
    {

        try {
            $command = unserialize(base64_decode($command));
            $command->setRunningInBackground(true);
            $this->commandBus->handle($command);
        } catch (\Exception $e) {
            \Yii::warning($e->getMessage().PHP_EOL.$e->getTraceAsString());

        }
    }
}