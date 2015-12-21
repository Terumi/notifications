<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

Route::group(["prefix" => 'notifications'], function () {
    Route::get('/', 'ffy\notifications\Http\Controllers\NotificationController@index');
    Route::get('create', function () {
        echo 'creating notification';

        $data = ['name' => 'Nikos', 'val' => rand(1, 1000)];
        $rand_url = 'some_url_' . rand(0, 1000);
        $seen = rand(0, 1);
        $user_id = 1;

        $notification = Notifier::notify($user_id, $seen, $data, $rand_url);

        if ($seen) {
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

    Route::get('follow/{id}', 'ffy\notifications\Http\Controllers\NotificationController@follow');
    Route::get('see/{id}', 'ffy\notifications\Http\Controllers\NotificationController@see');
    Route::get('unsee/{id}', 'ffy\notifications\Http\Controllers\NotificationController@unsee');
});

