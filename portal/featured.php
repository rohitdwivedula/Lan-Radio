<?php

include '../mysql-values.php';
$fullname = $_GET["name"];
$special = $_GET["featured"];
$sql = "UPDATE `podcast_details` SET `special` = \"$special\" WHERE `podcast_details`.`fullname` = \"$fullname\";";
$result = $conn->query($sql);
if($result){
    echo "Done";
}else{
    echo $conn->error;
    echo "OOPS";
}
?>