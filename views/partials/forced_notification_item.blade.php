<div class="alert alert-warning alert-dismissible ffy-notification" data-notificationid="{{$notification->id}}"
     role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <ul>
        {{Auth::user($notification->user_id)->email }} // id: {{$notification->notification_type}} //
        seen: {{$notification->seen}}
    </ul>
</div>