<?php include 'slider.php' ?>
<script>
  
</script>
    <main class="container main-content">
      <br>
      <h5>Featured Podcasts</h5>
<div class="row podcast">
<?php

include 'mysql-values.php';
$sql = "SELECT * FROM podcast_details;";

$result = $conn->query($sql);
if($result->num_rows > 0){
  $count = 0;
  while($row = $result->fetch_assoc()){
    $count++;

    $fullname = $row["fullname"];
    $image_location = $row["location"];
    $artist = $row["artist"];
echo<<<EOL
          <div class="col-md-3 fetch-list" data-title="$fullname"><img src="$image_location" class="podcast-img">
          <span>$fullname</span><span class="artist">$artist</span>
        </div>

EOL;
    if($count%4==0){
      echo "</div><div class='row podcast'>";
    }
  }
}else{
  echo $conn->error;
}

?>
      <br>
</div>
      <div class="row">
        <div class="col-md-12">
                  <hr>
          Copyright 2019 Lan Radio Commitee, BITS Pilani, Hyderabad Campus. <b class="red">UNDER CONSTRUCTION</b>
          <br>Programmed by Divyanshu Agrawal, Design & Gaphics by Suraj Thotakura, Server & Networking by Naveen Kumar Battula.</div>
          <br><br>          
        </div>

      </div>





    </main>