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
        $this->setAttribute('seen', 1);
        $this->setAttribute('seen_at', Carbon::now());
        return $this->save();
    }

    public function unsee()
    {
        $this->setAttribute('seen', 0);
        $this->setAttribute('seen_at', null);
        return $this->save();
    }
}
