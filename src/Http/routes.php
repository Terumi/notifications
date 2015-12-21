<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

Route::group(["prefix" => 'notifications'], function () {
    Route::get('/', 'ffy\notifications\Http\Controllers\NotificationController@index');
    Route::get('create', function () {
        echo 'creating notification';
        $notification = Notifier::notify(1, 1, ['name' => 'Nikos', 'val' => rand(1, 1000)]);

        $seen = rand(0, 1);
        if ($seen == 1) {
            $notification->seen = 1;
            $notification->seen_at = Carbon::today()->subDays(rand(1, 400));
            $notification->save();
        }
        echo "<br>done!";
    });

    Route::get('view', function () {
        Auth::loginUsingId(1);
        $notifications = Auth::user()->notifications;
        //this returns the package view
        return view('notifications::index')->with('notifications', $notifications);
    });

    Route::get('see/{id}', 'ffy\notifications\Http\Controllers\NotificationController@see');
    Route::get('unsee/{id}', 'ffy\notifications\Http\Controllers\NotificationController@unsee');
});

