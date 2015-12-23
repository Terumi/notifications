@extends('layouts.master')
@section('content')
    <h2>Notification list</h2>
    <input type="hidden" value="{{csrf_token()}}" id="_token">
    @if(!is_null($forced_notifications))
        @each('notifications::partials.forced_notification_item', $forced_notifications, 'notification')
    @endif

    <ul class="list-unstyled">
        @each('notifications::partials.notification_item', $notifications, 'notification')
    </ul>

@stop