<?php namespace Larabook\Core;

use App;

/**
 * Class CommandBus
 * @package Larabook\Core
 */
trait CommandBus
{

    /**
     * Execute Command
     * @param $command
     */
    public function execute($command)
    {
        return $this->getCommandBus()->execute($command);
    }

    /**
     * Fetch Command bus
     * @return mixed
     */
    public function getCommandBus()
    {
        return App::make('Laracasts\Commander\CommandBus');
    }
}