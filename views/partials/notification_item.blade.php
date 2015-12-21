<li>
    @if(!$notification->seen)
        <a href="{{url('notifications/see', ['id' => $notification->id])}}">mark seen</a>
    @else
        <a href="{{url('notifications/unsee', ['id' => $notification->id])}}">mark unseen</a>
    @endif
    {{--notification description--}}
    {{Auth::user($notification->user_id)->email }} // id: {{$notification->notification_type}} //
    seen: {{$notification->seen}}

    {{--follow link--}}
    @if($notification->url)
        <a href="{{url('notifications/follow', ['id' => $notification->id])}}" target="_blank">follow</a>
    @endif
</li>