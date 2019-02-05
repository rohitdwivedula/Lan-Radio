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
<h1>Zip file upload result</h1>
<hr>
<code>
<?php
include 'mysql-values.php';
$fullname = $_SESSION['fullname'];
$uploadedFile = $_FILES['zip']['tmp_name'];
$destination = "podcast_songs/$fullname.zip";
if(file_exists($uploadedFile))
{
   echo "file uploaded to temp dir";
}
else
{
   echo "file upload failed";
   exit();
}
if(move_uploaded_file($uploadedFile, $destination))
{
   echo "upload complete";
}
else
{
   echo "move_uploaded_file failed";
   exit();
}
$location=`"podcast_songs/`.`$fullname"`;

$name_of_zipfile = $fullname;
$full_name = $name_of_zipfile.".zip";
$output = shell_exec(`unzip "podcast_songs/$fullname" -d "podcast_songs/$fullname"
chmod -R 777 "podcast_songs/$name_of_zipfile"`);
$dir = "podcast_songs/$fullname";
$list = array_diff(scandir($dir), array('..', '.'));
foreach($list as $item) {
  $noExtension = substr($item, 0 , (strrpos($item, ".")));
  $sql = "INSERT INTO `$fullname` (`id`, `song_title`, `song_location`) VALUES (NULL, '$noExtension', '$item');";
  if(mysqli_query($conn, $sql)){
  	echo "<h4>Added a song .You are good to go!</h4>";
  }else{
    echo "FATAL ERROR!<br>	";
  }

}

?></code>
<hr>
<a class="btn btn-success" href="create-podcast.php">Add another podcast</a>
</div>
</body>
</html>