<h2>Notification list</h2>

@if(!is_null($forced_notifications))
    <p>we have notifications!</p>
@endif

<ul class="list-unstyled">
    @each('notifications::partials.notification_item', $notifications, 'notification')
</ul>
