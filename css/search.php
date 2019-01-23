<?php 
include 'mysql-values.php';
$query = $_GET['query'];
$sql = "SELECT * FROM `podcast_detai` WHERE (`fullname` LIKE '%$search%' OR `artist` LIKE '%$search%')";
$result = mysqli_query($conn, $sql);


if($result){
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
	$fullname = $row['fullname'];
	$artist = $row['artist'];
echo<<<EOL

<li><b>$fullname</b> by $artist</li>

EOL;
}}
}


?>