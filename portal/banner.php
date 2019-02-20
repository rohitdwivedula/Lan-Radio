<?php

$title = $_POST["title"];
$subtitle = $_POST["subtitle"];
$id = $_POST["id"];
$podcast = $_POST["podcast"];
$saveName = "banner".$id;
if(move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $saveName)){
    echo "Image updated";
}else{
   echo  "Image upload failed";
   echo $_FILES["image"]["error"];
}
include '../mysql-values.php';
$sql = "UPDATE `banners` SET `title` = '$title', `subtitle` = '$subtitle', `podcast`='$podcast' WHERE `banners`.`id` = '$id';";
if(mysqli_query($conn, $sql)){
    echo "Record changed";
}else{
    echo $conn->error;
}

?>