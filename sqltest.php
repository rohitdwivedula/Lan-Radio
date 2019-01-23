<?php
include 'mysql-values.php';
$fullname=trim($_GET['fullname']);
$qry="CREATE TABLE `imarcat`.`$fullname` ( `id` INT NOT NULL AUTO_INCREMENT , `song_title` TEXT NOT NULL , `song_location` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";



if(mysqli_query($conn, $qry)){
  echo "<div>Log : OK. Table Created successfully.</div>";
  }else{
    echo "ERROR: SQL Was not able to execute Query. " . mysqli_error($conn);
}

?>