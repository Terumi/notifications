$(function () {
    $('.ffy-notification').on('closed.bs.alert', function (item) {
        $.get("notifications/see/" + $(this).data('notificationid'), {_token: $('#_token').val()});
    })
});