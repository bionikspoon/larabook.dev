<?php namespace Larabook\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class EventServiceProvider
 *
 * @package Larabook\Providers
 */
class EventServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['events']->listen('Larabook.*', 'Larabook\Handlers\EmailNotifier');
    }
}
