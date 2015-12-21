<h2>Notification list</h2>
<ul class="list-unstyled">
    @foreach($notifications as $notification)
        <li>
            @if(!$notification->seen)
                <a href="{{url('notifications/see', ['id' => $notification->id])}}">mark seen</a>
            @else
                <a href="{{url('notifications/unsee', ['id' => $notification->id])}}">mark unseen</a>
            @endif
            {{Auth::user($notification->user_id)->email }} // id: {{$notification->notification_type}} // seen: {{$notification->seen}}
        </li>
    @endforeach
</ul>
