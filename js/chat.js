//Author:Divyanshu Agrawal
var chat;
var myUsername = "Anon";
var chatFullScreen = false;
var refreshChat;
var count = 0;

function sendChat(result) {
    chat = result;

}


$(document).on("click", '.links a', function() {
    if (myUsername != "Anon") {
        setTimeout(function() { $('.live-input').prop("disabled", false); }, 1000);

    }
});


function processChat() {
    if (!chat.errorMessage) {
        $(".chat-box").html("");
        for (var i = 0; i < chat.texts.length; i++) {
            if (chat.texts[i].username === myUsername) {
                $(".chat-box").append(
                    "<div class='live-chat-message my-message'><span class='live-username'>" + "You" + "</span><span class='live-message'>" +
                    chat.texts[i].message + "</span></div>"
                );
            } else {
                $(".chat-box").append(
                    "<div class='live-chat-message'><span class='live-username'>" + chat.texts[i].username + "</span><span class='live-message'>" +
                    chat.texts[i].message + "</span></div>"
                );
            }

        }
    }
    //$('.chat-message-box').scrollTop($('.chat-message-box').scrollHeight);


}

function scrollBottom() {
    var scroll = $('.chat-box');
    var height = scroll[0].scrollHeight;
    scroll.scrollTop(height);
    if (chatFullScreen) {
        scroll = $('.full-live-chat');
        height = scroll[0].scrollHeight;
        scroll.scrollTop(height);
    }

}

function loadChat() {
    var res = "result";
    var d = new Date();
    var uri = "chat.json?time=" + d.getTime();
    $.ajax(uri)
        .done(function(result) {
            sendChat(result);
            processChat(chat);
            console.log("Chat loaded");
        })
        .fail(function() {
            sendChat({ "errorMessage": "404" });
        });

}

function initChat() {
    myUsername = $(".live-username-input").val();
    loadChat();
    refreshChat = setInterval(loadChat, 1000);
    setTimeout(scrollBottom, 500);
}

function sendLiveMessage() {
    clearInterval(refreshChat);
    var message = $(".live-input").val();
    $(".chat-box").append(
        `<div class='live-chat-message my-message'><span class='live-username'>` + `You` + `</span><span class='live-message'><i class='text-warning'>Sending message</i></span></div>`
    );
    scrollBottom();
    $(".live-input").blur();

    var uri = "send-live-message.php?username=" + myUsername + "&message=" + message;
    $.ajax(uri)
        .done(function(result) {
            $(".live-input").val("");
            loadChat();
            refreshChat = setInterval(loadChat, 1000);
            count = 0;
            scrollBottom();
        })
        .fail(function() {
            $(".chat-box").append("<span class='alert alert-danger'>Failed to send message</span/>");
        });

    ;
}


$(document).on('keyup', ".live-input", function(e) {

    if (e.which == 13 && count == 0) {
        count++;
        sendLiveMessage();

    } else {}
});




$(document).on('keypress', ".live-username-input", function(e) {
    if (e.which == 13) {
        $('.live-input').prop("disabled", false);
        initChat();
    }
});

function fullChat() {
    chatFullScreen = !chatFullScreen;
    if (chatFullScreen) {
        $(".live-chat").addClass("full-live-chat");
        $(".full-chat").html("Exit");
    } else {
        $(".live-chat").removeClass("full-live-chat");
        $(".full-chat").html("Chat Full Screen");
    }
}

$(".full-screen-chat").click(function() {


});