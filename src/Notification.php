<?php

namespace ffy\notifications;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'ffy_notifications';
    protected $fillable = ['user_id', 'notification_type', 'seen', 'data', 'url'];

    public function getDataAttribute()
    {
        return json_decode($this->attributes['data']);
    }

    public function see()
    {
        return $this->setAttribute('seen', 1)
            ->setAttribute('seen_at', Carbon::now())
            ->save();
    }

    public function unsee()
    {
        return $this->setAttribute('seen', 0)->save()
            ->setAttribute('seen_at', null)
            ->save();
    }

}
