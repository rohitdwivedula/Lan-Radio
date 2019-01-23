<!DOCTYPE html>
<html lang="en">
<head>
  <title>Show Podcasts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway|Roboto|Roboto+Condensed" rel="stylesheet">
			
       <?php
$servername = "localhost";
$username = "adminboys12345";
$password = "root@123";
$dbname = "imarcat";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>	  
	 
	 <?php
$DB_host = "localhost";
$DB_user = "adminboys12345";
$DB_pass = "root@123";
$DB_name = "imarcat";

 try
 {
     $DBcon = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
     $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch(PDOException $e)
 {
     echo "ERROR : ".$e->getMessage();
 }
?>
 <?php
 $fullname=$_REQUEST['fullname'];
?>


    <br><br><br>
    
  <div class="container">     
    <div class="row">
      <div class="col-sm-6 bg-white">
        <?php
               $sql = "SELECT * FROM podcast_details WHERE fullname='$fullname';";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
                 $image_location = $row["location"]; 
                 $artist = $row["artist"];
               ?>
               
               
     <img style="width:150px;height:200px;" src="<?php echo  $row["location"]; ?>">
     <br>
       <center><h5><b>  <?php echo  $row["fullname"]; ?></b></h5></center><br>
        <center><h5><b>  <?php echo  $row["artist"]; ?></b></h5></center><br>
       <center><h5><b>  <?php echo  $row["description"]; ?></b></h5></center><br>
      
               
               
               
<?php
  }
}

?>
      </div>
      <div class="col-sm-6 bg-light">
    
                <?php
                
                $mysql_tb = $fullname;
          
$sqla = "SELECT * FROM `{$mysql_tb}`";


               $resulta = $conn->query($sqla);
               if ($resulta->num_rows > 0) {
               while($rowa = $resulta->fetch_assoc()) {
                   $song_location =  $rowa["song_location"];
                 
               ?>
               
       
                   
    <div style="text-align:center;color:black;" id="list">
      <a href="#" data-name="<?php echo  $rowa["song_title"]; ?>" data-value="podcast_songs/<?php echo $fullname?>/<?php echo  $rowa["song_location"];?>"><?php echo  $rowa["song_title"]; ?></a>
    


                   
                   
          
     
       <script>
list.onclick = function(e) {
  e.preventDefault();

  var elm = e.target;
  var audio = document.getElementById('audio');
  
  var playing_song_name = elm.getAttribute('data-name');
  document.getElementById('display_song_name').innerHTML = playing_song_name;

  var source = document.getElementById('audioSource');
  source.src = elm.getAttribute('data-value');
  


  audio.load(); //call this to just preload the audio without playing
  audio.play(); //call this to play the song right away
  document.getElementById('play_song_div').style.display='block';
  
};
</script>

       <hr>
       <br>
      
      <?php
  }
}
     ?>               
    

     
     </div>


 


   



        
        
      </div>
    </div>
  </div> 
  </div>
  </div>
 
<div id="play_song_div" style="width:100%;height:100px;background-color:#f2f4f5;color:black;display:none;margin-top:10%;" >
        
         <div style="width:10%;float:left;">
             <img style="width:100%;height:100px;" src="<?php echo  $image_location; ?>">
        </div>
        
        <div style="width:15%;margin-left:5%;float:left;">
          <br>
            <b><h6 id="display_song_name">Srinivas</h6></b>
            
            <p><?php echo  $artist; ?></p>
        </div>
        <br>
        <audio style="width:70%;float:right;" id="audio" controls="controls">
  <source id="audioSource" src=""></source>
  Your browser does not support the audio format.
</audio>
        <br>
    </div>










 

