<h2>Notification list</h2>
<ul class="list-unstyled">
    @foreach($notifications as $notification)
        <li>{{$notification->notification_type}}</li>
    @endforeach
</ul>
