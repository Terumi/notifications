<?php

namespace ffy\notifications;

use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'notifications');

        $this->publishes([
            __DIR__ . '/../views' => base_path('resources/views/ffy/notifications'),
        ]);
    }

    public function register()
    {

        $this->app->bindShared('notification', function () {
            return $this->app->make('ffy\notifications\NotificationDispatcher');
        });

        include __DIR__ . '/Http/routes.php';
    }
}