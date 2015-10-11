<?php


namespace ffy\notifications;

trait NotifiableTrait
{
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}