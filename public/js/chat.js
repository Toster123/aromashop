var socket = io(':6001');
function scrollDialog () {
    document.getElementById('scrollchat').scrollTop = document.getElementById('scrollchat').scrollHeight;
}
$(document).ready(
    function () {
        scrollDialog();
        var is_loading = false;
        $('.msg_history').scroll(function () {
            if (!is_loading && $('.msg_history').scrollTop() < 1) {
                is_loading = true;
                $.ajax({
                    url: moreMessagesUrl + '?message=' + $('.msg_history').find(':first-child').attr('id'),
                    type: 'GET',
                    datatype: 'html',
                    success: function (messages) {
                        var id = $('.msg_history').find(':first-child').attr('id');
                        $('.msg_history').prepend(messages);
                        // document.getElementById(id).scrollIntoView({block: "start", behavior: "auto"});
                        document.getElementById('scrollchat').scrollTop = (document.getElementById('scrollchat').scrollHeight - document.getElementById(id).offsetTop - document.getElementById(id).scrollHeight);
                        if ($('.msg_history').find(':first-child').attr('id') !== 'last') {
                            is_loading = false;
                        }

                    }
                });
            }
        });
    }
);



//sending message---------------------------------------------------------
$(document).on('submit', 'form', function (e) {
    e.preventDefault();
    if (document.getElementById('photos').value || document.getElementById('message').value) {
        let message = ``;
        message += `<div class="outgoing_msg"><div class="sent_msg"><p>`;
        message += document.getElementById('message').value;
        message += `</p>`;
        if (document.getElementById('photos').files.length > 0) {
            message += `<div class="images_scroll outgoing_imgs">`;
            for (let i = 0; i < document.getElementById('photos').files.length; i++) {
                message += `<img class="image" height="140" src="` + messageNoPhotoUrl + `" alt="">`;
            }
            message += `</div>`;
        }
        message += `<span class="time_date"><i class="ti-timer"></i> Sending...</span></div></div>`;

        $('.msg_history').append(message);

        scrollDialog();

        socket.emit('sendMessageQuery', dialogId);

    }
});

socket.on('selectedDialogs', function (response) {
    var formData = new FormData(document.getElementById('messageSendForm'));
    formData.append('seen', response);
    document.getElementById('messageSendForm').reset();

    $.ajax({
        url: sendMessageUrl,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            data = JSON.parse(data);
            $('.sent_msg:last').find('p').next('.outgoing_imgs').remove();
            $('.sent_msg:last').find('p').after(data.images);
            $('.sent_msg:last').find('span').html(data.date);
            scrollDialog();
        }
    });

});

socket.on('adminMessage', function (data) {
    $('#scrollchat').append(data.messageHTML);
    scrollDialog();
});
