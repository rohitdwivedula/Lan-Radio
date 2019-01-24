<?php 
session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Upload & Create Podcast</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <style type="text/css">
   *{
    box-sizing:border-box;
  }
  body{
    font-family:Roboto,Arial;
    background: #ff5d5f;
  }
    .content,.header{
      margin:0 auto;
      padding:40px;
      width:800px;
      box-shadow:0px 0px 40px 0px rgba(0,0,0,0.7);
      background: white;
      margin-top:50px;
      margin-bottom: 50px;
      max-width: 95%;
    }
    .header{

    }
    .red{
      color:#ff5d5f;
    }
    .form-group{
      padding:30px;
      margin-bottom:20px;
      background: whitesmoke;
    }
    
  </style>
</head>
<body>

<div class="content container">
  <H1>Result</H1><Br>
        <small class="red">System created by Divyanshu Agrawal. In case of errors, contact via facebook or call 9521738499</small>
  <hr>

<?php

include 'mysql-values.php';

  $fullname=$_POST["fullname"];




  $fuck = mysqli_real_escape_string($conn,$fullname);
  $_SESSION['fullname'] = $fullname;
  $fullname = trim($fullname);
  $artist=mysqli_real_escape_string($conn,$_POST["artist"]);
  $description=mysqli_real_escape_string($conn,$_POST["description"]);
        
	$fileinfo=PATHINFO($_FILES["image"]["name"]);
	$newFilename=$fileinfo['filename'].'.'.$fileinfo['extension'];
	move_uploaded_file($_FILES["image"]["tmp_name"],"podcast_details/" . $fullname);
  $location="podcast_details/" . $fullname;
  $qry="insert into imarcat.podcast_details(fullname,artist,description,location)values('$fullname','$artist','$description','$location')";






	
	
	
	if(mysqli_query($conn, $qry)){
    echo "<h2>Records added successfully. Time for Step 2.</h2>";
     } else{
    echo "<h2>ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    echo "</h2>";
}



$qry="CREATE TABLE `imarcat`.`$fullname` ( `id` INT NOT NULL AUTO_INCREMENT , `song_title` TEXT NOT NULL , `song_location` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
  if(mysqli_query($conn, $qry)){
  echo "<div>Log : OK. Table Created successfully.</div>";
  }else{
    echo "$fullname Line Error::ERROR: SQL Was not able to execute Query. " . mysqli_error($conn);
}



?>
      
      
      
      
      <hr>
      <form method="POST" action="zip-file.php" enctype="multipart/form-data">
        
                              <div class="form-group">
                                <label for="zip">Upload a <B>.ZIP</B> file here that contains only .MP3 files. These .MP3 files will be the podcast files.

                                  <h3 CLASS="red">IMPORTANT</h3>
                                  <b>The name of .MP3 files should be the actual name of the Song.<br> So valid file name is <span class="text-success">'Bitch Lasagna.mp3'</span> and not <span class="red">'Bitch_Lasagna_1234FREESONGS.COM.mp3' </span>!
                                </label>
                                <input autocomplete="none" type="file" name="zip" class="form-control-file" accept=".zip" required />
                              </div>

                              <div class="form-group">
                                <label for="zip">Submit</label>
                                <input type="submit" class="btn btn-primary" />
                              </div>
      </form>
  <hr>

</div>
    
</body>
</html>