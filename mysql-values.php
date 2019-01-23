<?php 


$servername = "127.0.0.1";
$username = "bits";
$password = "lite@123";
$dbName = "imarcat";
$DB_host = "127.0.0.1";
$DB_user = "bits";
$DB_pass = "lite@123";
$DB_name = "imarcat";



// $servername = "127.0.0.1";
// $username = "root";
// $password = "";
// $dbName = "imarcat";
// $DB_host = "127.0.0.1";
// $DB_user = "root";
// $DB_pass = "";
// $DB_name = "imarcat";







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