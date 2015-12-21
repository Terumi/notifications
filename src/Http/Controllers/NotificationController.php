<?php

namespace ffy\notifications\Http\Controllers;

use ffy\notifications\Notification;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        /** delete this **/
        Auth::loginUsingId(1);

        $user = Auth::user();
        return view('notifications::index')->with('notifications', $user->notifications);
    }

    public function see($id)
    {
        $notification = Notification::find($id);
        $notification->seen = 1;
        $notification->save();
        return "ok";
    }

    public function unsee($id)
    {
        $notification = Notification::find($id);
        $notification->seen = 0;
        $notification->save();
        return "ok";

    }
}
