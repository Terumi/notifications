<h2>Notification list</h2>
<ul class="list-unstyled">
    @foreach($notifications as $notification)
        <li>{{$notification->notification_type}} // {{Auth::user($notification->user_id) }}</li>
    @endforeach
</ul>
