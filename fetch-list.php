<?php 
include 'mysql-values.php';

try
 {
     $DBcon = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
     $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch(PDOException $e)
 {
     echo "ERROR : ".$e->getMessage();
 }

$fullname=$_REQUEST['title'];

?>

        <?php
               $sql = "SELECT * FROM podcast_details WHERE fullname='$fullname';";
               //echo $fullname;
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
               	?>

            
<div class="row">
    <div class="col-md-4 album-art-div">
        <img class="album-art" src="<?php echo  $row["location"]; ?>"></img>
    </div>
    <div class="col-md-3 details-div">
        <h1 style="color:#FF5757" class="popup-title"><?php echo  $row["fullname"]; ?></h1>
        <h2 class="popup-artist"><?php echo  $row["artist"]; ?></h2>
        <!--<div class="play-button-popup play-songs" data-url="podcast_songs/<?php echo $_REQUEST['title']."/".$song_location; ?>">
            <img src="img/play-button.svg" alt="PLAY" width=42 height=42>
        </div>-->
        <br>
        <p><?php echo  $row["description"]; ?></p>
    </div>
       <?php 
       }
           	}else{
                ECHO " <h1 class='red'>Podcast not found</h1><p>It was probably deleted</p>";
            }
               ?>
            

    <div class="col-md-5">
        <ul class="queue-list">
                <?php
                
                $mysql_tb = $fullname;
          
$sqla = "SELECT * FROM `$mysql_tb`";

	
               $resulta = $conn->query($sqla);
               if ($resulta->num_rows > 0) {
               	$count = 0;
               while($rowa = $resulta->fetch_assoc()) {
                   $song_location =  $rowa["song_location"];
                   $count+=1;
                 
               ?>


            <li>
                <div class="row play-song" data-title="<?php echo  $rowa["song_title"]; ?>" data-url="podcast_songs/<?php echo $_REQUEST['title']."/".$song_location; ?>">
                    <div class="col-md-2"><img src="img/play-button.svg" alt="Play" class="list-play-button"></div>
                    <div class="col-md-8"><?php echo  $rowa["song_title"]; ?></div>
                    <div class="col-md-2">2:54</div>
                </div>

            </li>
            <?php
        }
	}

            ?><!--
            <li>
                <div class="row">
                    <div class="col-md-2">2.</div>
                    <div class="col-md-8">Episode 1: The Sound of Colors</div>
                    <div class="col-md-2">2:54</div>
                </div>

            </li>
            <li>
                <div class="row">
                    <div class="col-md-2">3.</div>
                    <div class="col-md-8">Episode 1: The Sound of Colors</div>
                    <div class="col-md-2">2:54</div>
                </div>

            </li>
            <li>
                <div class="row">
                    <div class="col-md-2">4.</div>
                    <div class="col-md-8">Episode 1: The Sound of Colors</div>
                    <div class="col-md-2">2:54</div>
                </div>

            </li>
            <li>
                <div class="row">
                    <div class="col-md-2">5.</div>
                    <div class="col-md-8">Episode 1: The Sound of Colors</div>
                    <div class="col-md-2">2:54</div>
                </div>

            </li>
            <li>
                <div class="row">
                    <div class="col-md-2">6.</div>
                    <div class="col-md-8">Episode 1: The Sound of Colors</div>
                    <div class="col-md-2">2:54</div>
                </div>

            </li>-->
        </ul>
    </div>
</div>