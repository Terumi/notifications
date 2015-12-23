<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

Route::group(["prefix" => 'notifications'], function () {

    Route::get('/', 'ffy\notifications\Http\Controllers\NotificationController@index');

    Route::get('follow/{id}', 'ffy\notifications\Http\Controllers\NotificationController@follow');

    Route::get('see/{id}', 'ffy\notifications\Http\Controllers\NotificationController@see');

    Route::get('unsee/{id}', 'ffy\notifications\Http\Controllers\NotificationController@unsee');

    // this is an example, please delete
    Route::get('create', function () {
        echo 'creating notification';

        foreach (range(10, 50) as $item) {
            $data = ['name' => 'Nikos', 'val' => rand(1, 1000)];
            $rand_url = 'some_url_' . rand(0, 1000);
            $type_id = rand(0, 1);
            $user_id = 1;

            $notification = Notifier::notify($user_id, $type_id, $data, $rand_url);

            if (rand(0, 1)) {
                $notification->seen = 1;
                $notification->seen_at = Carbon::today()->subDays(rand(1, 400));
                $notification->save();
            }
        }
        echo "<br>done!";
    });

});

