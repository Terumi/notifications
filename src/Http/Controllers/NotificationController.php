<?php

namespace ffy\notifications\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        // delete this
        Auth::loginUsingId(1);
        // delete this
        $user = Auth::user();
        return view('notifications::index')->with('notifications', $user->notifications);
    }
}
