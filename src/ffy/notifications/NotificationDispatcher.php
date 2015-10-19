<?php

namespace ffy\notifications;


class NotificationDispatcher
{
    /**
     * Create a notification for a user
     *
     * @param $user_id
     * @param $data
     */
    public function notify($user_id, $data)
    {
        Notification::create([
            'user_id' => $user_id,
            'notification_type' => 0,
            'data' => json_encode($data)
        ]);
    }

}