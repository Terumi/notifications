<?php

namespace ffy\notifications;

use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'notifications');

        $this->commands(['ClearOldNotifications']);

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

        include __DIR__ . '/Http/routes.php';
    }
}