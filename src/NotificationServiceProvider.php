<?php

namespace ffy\notifications;

use ffy\notifications\Commands\ClearOldNotifications;
use ffy\notifications\Commands\CountUnseenNotifications;
use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'notifications');

        $this->publishes([
            __DIR__ . '/../views' => base_path('resources/views/vendor/notifications')
        ], 'views');

	    $this->publishes([
		    __DIR__.'/../database/migrations/' => database_path('migrations')
	    ], 'migrations');
    }

    public function register()
    {

        $this->app->bindShared('notification', function () {
            return $this->app->make('ffy\notifications\NotificationDispatcher');
        });

        //register commands

        $this->app['ffy-notifications.purge-old'] = $this->app->share(function($app) {
            return new ClearOldNotifications();
        });

        $this->app['ffy-notifications.count-unseen'] = $this->app->share(function($app) {
            return new CountUnseenNotifications();
        });

        $this->commands('ffy-notifications.purge-old');
        $this->commands('ffy-notifications.count-unseen');

        include __DIR__ . '/Http/routes.php';
    }
}