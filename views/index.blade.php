<h2>Notification list</h2>
<ul class="list-unstyled">
    @each('notifications::partials.notification_item', $notifications, 'notification')
</ul>
