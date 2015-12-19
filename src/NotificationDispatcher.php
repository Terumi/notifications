<?php

namespace ffy\notifications;


class NotificationDispatcher
{
    /**
     * Create a notification for a user
     *
     * @param $user_id
     * @param $notification_type
     * @param $data
     */
    public function notify($user_id, $notification_type, $data)
    {
        $notification = Notification::create([
            'user_id' => $user_id,
            'notification_type' => $notification_type,
            'data' => json_encode($data)
        ]);
        return $notification;
    }

}