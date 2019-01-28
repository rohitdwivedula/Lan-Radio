<?php 

//PASSWORDS HIDDEN




$conn = new mysqli($servername, $username, $password, $dbName);


if ($conn->connect_error) {


    die("Connection failed: " . $conn->connect_error);
} 




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
