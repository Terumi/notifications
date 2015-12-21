<li>
    @if(!$notification->seen)
    <a href="{{url('notifications/see', ['id' => $notification->id])}}">mark seen</a>
    @else
    <a href="{{url('notifications/unsee', ['id' => $notification->id])}}">mark unseen</a>
    @endif
    {{Auth::user($notification->user_id)->email }} // id: {{$notification->notification_type}} // seen: {{$notification->seen}}
</li>