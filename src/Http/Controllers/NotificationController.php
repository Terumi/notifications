<?php

namespace ffy\notifications\Http\Controllers;

use ffy\notifications\Http\Requests\NotificationRequest;
use ffy\notifications\Notification;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class NotificationController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $normal_notifications = $user->notifications()
            ->where('notification_type', 0)
            ->get();
        $forced_notifications = $user->notifications()
            ->where('notification_type', 1)
            ->where('seen', 0, 'and')
            ->get();

        return view('notifications::index')
            ->with('notifications', $normal_notifications)
            ->with('forced_notifications', $forced_notifications);
    }

    public function follow(NotificationRequest $request, $id)
    {
        $notification = Notification::find($id);
        $notification->see();
        if ($notification->url)
            return Redirect::to($notification->url);
        else
            return Redirect::back();
    }

    public function see(NotificationRequest $request, $id)
    {
        $notification = Notification::find($id);
        $notification->see();
        return "ok";
    }

    public function unsee(NotificationRequest $request, $id)
    {
        $notification = Notification::find($id);
        $notification->unsee();
        return "ok";
    }
}
