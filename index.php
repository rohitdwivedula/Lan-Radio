<!doctype html>
<!-- Livestream
http://192.168.0.102:8000/stream

 -->
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="favicon.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>LAN Radio</title>
  </head>
  <body>
        <div class="album-smart"></div>
    <div class="loader-trans">
        <div class="ajaxify-loader">
          Loading
    </div>      
    </div>




    <?php include 'navbar.php' ?>
<div class="content-root">      
    <?php include 'special-index.php' ?>
</div>


    <div class="music-player" data-toggle="popover" data-content="Disabled popover">
      <div class="row music-player-image">
      <div class="col-md-2">
        <img class="current-image" src="img/placeholder-album.png" alt="Ablum Art">
      </div>
      <div class="col-md-4">
        <h5 class="player-title">Ready to Play</h5><span class="player-artist">Choose an album</span>
      </div>
      <div class="col-md-6">
        <audio controls class="player" id="player">
          <source src="" type="audio/mp3" class="player-source" id="player-source">
        Your browser does not support the audio element.
        </audio>
        <div class="mobile-player">
          <img src="img/play-button.svg" class="pause-play" alt="Pause-Play">
        </div>


      </div>
      </div>
    </div>
    <div class="big-music-player">
      <div class="big-current-image">
        
      </div>
    </div>
          <div class="popup">

          <div class="popup-close">
          <img src="img/close.svg" width=32 alt="CLOSE">
        </div>


        <div class="container popup-container">
          <h1>Album Details</h1>
          <h2>Should appear here soon...</h2>
                 
       </div>
        </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/ajaxify.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/chat.js"></script>
    
  </body>
</html>