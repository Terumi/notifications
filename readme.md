## Laravel 5.1 notifications

- composer require ffy/notifications (dev-master)
- service provider: ffy\notifications\NotificationServiceProvider::class,
- alias: 'Notifier' => ffy\notifications\NotificationFacade::class,
- user model should user the ffy\notifications\Notifiable trait
- run php artisan vendor:publish --force
- add ffy-notifications.js tο master layout

have fun

