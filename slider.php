<div id="carouselExampleControls" class="carousel slide custom-slider" data-ride="carousel">
  <div class="carousel-inner">
    <!-- <div class="carousel-item active fetch-list" data-title="StarTalk Radio">
      <img class="d-block w-100" src="img/bitch2.jpg" alt="First slide">
      <div class="carousel-caption">
    <h5>Listen to Neil deGrasse Tyson</h5>
    <p>Learn more about the universe</p>
  </div>
    </div> -->
    <!-- <div class="carousel-item ">
      <img class="d-block w-100" src="img/beatles-banner.jpg" alt="Second slide">
            <div class="carousel-caption">
    <h5>Beatles Selected</h5>
    <p>The Beatles</p>
  </div>
    </div> -->
    <!-- <div class="carousel-item ">
      <img class="d-block w-100" src="img/slider.gif" alt="First slide">
            <div class="carousel-caption">
    <h5>Curated Favourites</h5>
    <p>LAN Radio Commitee</p>
  </div>
    </div> -->
  <?php

  include 'mysql-values.php';
  $sql = "SELECT * FROM `banners`";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $id = $row['id'];
      $title = $row['title'];
      $subtitle = $row['subtitle'];
      $podcast = $row['podcast'];
      if($id=="1"){
        echo <<<EOL

    <div class="carousel-item active fetch-list" data-title="$podcast">
      <img class="d-block w-100" src="img/banner$id" alt="Image slide">
      <div class="carousel-caption">
        <h5>$title</h5>
        <p>$subtitle</p>
      </div>
    </div>
EOL;

      }
      else{
      echo <<<EOL

    <div class="carousel-item  fetch-list" data-title="$podcast">
      <img class="d-block w-100" src="img/banner$id" alt="Image slide">
      <div class="carousel-caption">
        <h5>$title</h5>
        <p>$subtitle</p>
      </div>
    </div>

EOL;
    }
  }}
  ?>
    <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>