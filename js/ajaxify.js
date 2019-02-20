function organize() {
    var widthImg = $(".podcast-img").width();
    $(".podcast-img").css("height", widthImg);

    var heightNavbar = $(".custom-navbar").height();
    $(".custom-slider").css("padding-top", heightNavbar);
    $(".custom-wrapper").css("height", heightNavbar);

    var ch = $(".current-image").css("width");
    $(".current-image").css("height", ch);
    $(".pause-play").css("height", ch);


}

organize();

function ajaxify(uri, target, loader) {
    if (!loader) {
        $('.ajaxify-loader').fadeIn()
        $('.loader-trans').fadeIn();
    }

    $.ajax({
        url: uri,
        success: function(result) {

            $("." + target).html(result);
            $("." + target).fadeIn(200);

            $('.ajaxify-loader').fadeOut(10);
            $('.loader-trans').fadeOut(10);
            organize();

        },
        error: function(xhr) {
            $('.ajaxify-loader').html("Check your internet connection and please reload the page. Error code :  " + xhr.status + " ");
            //$("." + target).html("<p>Check your internet connection. Or , there could be an error, i.e. " + xhr.status + " </p>");
        }
    });




}

$(document).on("click", ".fetch-list", function(event) {
    event.preventDefault();
    $('.ajaxify-loader').css("display", "block");
    $('.loader-trans').css("display", "block");
    //alert('lol');
    var uri = "fetch-list.php?title=" + $(this).data("title");
    var target = "popup-container";
    if (!target) {
        target = "popup-container";
    }
    uri = "" + uri;
    $(".popup").css("display", "block");
    ajaxify(uri, target);
});

var isPlayButton = true;
var noSelected = true;
$(document).on("click", ".play-song", function(event) {
    //alert("LOL");
    var src = $(this).data("url");
    var title = $(this).data("title");
    var artist = $(".popup-artist").html();
    var albumArt = $(".album-art").attr("src");
    $(".current-image").attr("src", albumArt);
    $(".player-title").html(title);
    $(".player-artist").html(artist);
    isPlayButton = false;
    $(".pause-play").attr("src", "img/pause-button.svg");
    //alert(src);
    var player = $("#player");
    noSelected = false;
    player.attr("src", src);
    //player.load();
    var pl = document.getElementById("player");
    pl.play();


});

var musicPlayer = {

}

$(".pause-play").on("click", function() {
    if (!noSelected) {
        if (isPlayButton) {
            var pl = document.getElementById("player");
            $(".pause-play").attr("src", "img/pause-button.svg");
            pl.play();
            isPlayButton = false;
        } else {
            var pl = document.getElementById("player");
            $(".pause-play").attr("src", "img/play-button.svg");
            pl.pause();
            isPlayButton = true;
        }
    } else {
        alert("Choose an album first");
    }

});


$(".links a").on("click", function() {
    $(".links a").removeClass("active");
    $(this).addClass("active");
})

$(document).ready(function() {
    $(".ajaxify").click(function(event) {
        event.preventDefault();
        $('.ajaxify-loader').fadeIn()
        $('.loader-trans').fadeIn()
            //alert('lol');
        var uri = $(this).data('uri');
        var target = $(this).data('target');
        uri = "" + uri;
        $("." + target).fadeOut(200, function() {
            ajaxify(uri, target);
        });


    });
});

$(".player").on("ended", function() {
    $(".player").currentTime = 0;
    $(".pause-play").attr("src", "img/play-button.svg");
    isPlayButton = true;
    console.log("ended");
})

var playlist = {
    enabled: false,
    list: [],
    currentName: "",
    currentOrder: 0,
    name: "",
    clear: function() {
        this.list = []
    },
    enable: function() {
        this.enabled = true
    },
    isEnabled: function() {
        return this.enabled
    },
    add: function(name) {
        this.list.push(name)
    },
    alert: function() {
        alert(this.list[0])
    },
    play: function() {
        $(".player-title").text(this.name + " Live Radio")
        $(".player-artist").text("Various Artists")
        $(".current-image").attr("src", "img/" + this.name + ".jpg")
    }

}


$(document).on("click", "[data-playlist]", function() {
    var category = $(this).data("playlist")
        //playlist.clear();
    $.ajax({
        url: "fetch-playlist.php",
        data: {
            "name": category
        },
        method: "GET",
        success: function(data) {
            playlist.enable()
            playlist.name = category;
            playlist.clear()
            playlist.list = JSON.parse(data)
            playlist.currentOrder = 0
            playlist.play();


        },
        error: function(xhr) {
            alert("Could not fetch playlist.")
        }
    })
})