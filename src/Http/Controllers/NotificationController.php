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
        /** delete this **/
        Auth::loginUsingId(1);

        $user = Auth::user();
        return view('notifications::index')->with('notifications', $user->notifications);
    }

    public function follow(NotificationRequest $request, $id)
    {
        $notification = Notification::find($id);
        $notification->see();
        return Redirect::to($notification->url);
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
