var LoadXkcd = function(comicNumber) {
    if (!comicNumber) {
        comicNumber = ``;
    }
    var uri = `https://xkcd.now.sh/` + comicNumber;
    return uri;
};


// Create the XHR object.
function createCORSRequest(method, url) {
    var xhr = new XMLHttpRequest();
    if ("withCredentials" in xhr) {
        // XHR for Chrome/Firefox/Opera/Safari.
        xhr.open(method, url, true);
    } else if (typeof XDomainRequest != "undefined") {
        // XDomainRequest for IE.
        xhr = new XDomainRequest();
        xhr.open(method, url);
    } else {
        // CORS not supported.
        xhr = null;
    }
    return xhr;
}

// Helper method to parse the title tag from the response.
function getTitle(text) {
    return text.match('<title>(.*)?</title>')[1];
}

// Make the actual CORS request.
function makeCorsRequest() {
    // This is a sample server that supports CORS.
    var url = LoadXkcd(0);

    var xhr = createCORSRequest('GET', url);
    if (!xhr) {
        alert('CORS not supported');
        return;
    }

    // Response handlers.
    xhr.onload = function() {
        var text = xhr.responseText;
        //var title = getTitle(text);
        console.log(text);
    };

    xhr.onerror = function() {
        console.log('Woops, there was an error making the request.');
    };

    xhr.send();
}




var pre_xkcd = {
    "month": "1",
    "num": 2097,
    "link": "",
    "year": "2019",
    "news": "",
    "safe_title": "Thor Tools",
    "transcript": "",
    "alt": "CORRECTION: After careful evaluation, we have determined that the axis label on this chart was printed backward.",
    "img": "https://imgs.xkcd.com/comics/thor_tools.png",
    "title": "Thor Tools",
    "day": "11"
};

LoadXkcd();
LoadXkcd(10);