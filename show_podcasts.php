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
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet">
	  <link rel="stylesheet" type="text/css" href="css/jquerytour.css" />
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
 


<center><h3 style="color:black;font-family: 'Roboto Condensed', sans-serif;">All Podcasts</h3></center><br> 
<div class="container-fluid">
    <div class="card-deck">
               <?php
               $sql = "SELECT * FROM podcast_details;";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
               ?>

    <a href="show_songs.php?fullname=<?php echo  $row["fullname"]; ?>">
        <div class="card">
      <div class="card-body">
      
	  <img style="width:100px;height:100px;" src="<?php echo  $row["location"]; ?>">
       <center><h5><b>  <?php echo  $row["fullname"]; ?></b></h5></center>
	  <font style="font-size:12px;">  <?php echo  $row["artist"]; ?></font><br>
	  </div>
</a>
     
	  <br><br>

    </div> 
      
  <?php
    }
} else {
    echo "0 results";
}

?> 


  </div>
</div>
