<h2>Notification list</h2>
<ul class="list-unstyled">
    @foreach($notifications as $notification)
        <li>{{Auth::user($notification->user_id)->email }} // id: {{$notification->notification_type}} // seen: {{$notification->seen}}</li>
    @endforeach
</ul>
