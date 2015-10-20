<?php

namespace ffy\notifications;

use Illuminate\Support\Facades\Facade;

class NotificationFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
       return 'notification';
    }
}