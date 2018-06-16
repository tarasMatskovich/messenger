$(document).ready(function() {
	$('.more-msg-info').click(function() {
		if($("#show-more-info-msg").is(":visible")) {
			$("#show-more-info-msg").fadeOut();
		} else {
			$("#show-more-info-msg").fadeIn();
		}
		
	});
    var baseImage = $('#img-preview').attr('src');
    $('#img2').change(function () {
        var input = $(this)[0];
        if (input.files && input.files[0]) {
            if (input.files[0].type.match('image.*')) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img-preview').fadeOut(0);
                    $('#img-preview').attr('src', e.target.result);
                    $('#img-preview').fadeIn(500);

                }
                reader.readAsDataURL(input.files[0]);
            } else {
                console.log('ошибка, не изображение');
            }
        } else {
            console.log('хьюстон у нас проблема');
        }
    });
    $('#reset-img-preview').click(function() {
        $('#img2').val('');
        $('#img-preview').attr('src', baseImage);
    });

    var socket = new WebSocket("ws://localhost:8080");
    var status = document.querySelector("#status");

    socket.onopen = function(event) {
        status.innerHTML = "Соединение установлено! <br>";
    }

    socket.onclose = function(event) {
        if(event.wasClean) {
            status.innerHTML = "Соединение закрыто!";
        } else {
            status.innerHTML = "Соединение как-то закрыто!";
        }
        status.innerHTML += "<br>код: " + event.code + " причина: " + event.reason;

    }

    socket.onmessage = function(event) {
        var message = JSON.parse(event.data);
        status.innerHTML +=  "<b>Отправиель:</b>" + message.name + "<br> <b>Сообщение</b>" + message.msg + "<br><br>";
    }

    socket.onerror = function(event) {
        status.innerHTML = "ошибка: " + event.message;
    }

    document.forms["messages"].onsubmit = function() {
        var message = {
            name: this.fname.value,
            msg: this.msg.value
        };
        socket.send(JSON.stringify(message));
        return false;
    }


});