<?php

namespace ffy\notifications;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'ffy_notifications';
    protected $fillable = ['user_id', 'notification_type', 'seen', 'data'];

    public function getDataAttribute()
    {
        return json_decode($this->attributes['data']);
    }

}
