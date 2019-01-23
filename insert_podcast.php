<?php

	$link = mysqli_connect("localhost", "root", "", "imarcat");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
        $fullname=$_POST["fullname"];
        
	$fileinfo=PATHINFO($_FILES["image"]["name"]);
	$newFilename=$fileinfo['filename'].'.'.$fileinfo['extension'];
	move_uploaded_file($_FILES["image"]["tmp_name"],"podcast_songs/" . $newFilename);
	$location="podcast_songs/" . $newFilename;
	
           
	$full = $fullname;
	
$qry="CREATE TABLE $full (location VARCHAR(255))";

$qry1="insert into $full(location)values('".$location."')";



	

?>


