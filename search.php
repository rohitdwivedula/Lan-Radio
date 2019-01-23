<?php 
include 'mysql-values.php';
$search = $_GET['q'];
$sql = "SELECT * FROM `podcast_details` WHERE (`fullname` LIKE '%$search%' OR `artist` LIKE '%$search%')";
$result = mysqli_query($conn, $sql);


if($result){
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
	$fullname = $row['fullname'];
	$artist = $row['artist'];
echo<<<EOL

<li class="fetch-list" data-title="$fullname"><b>$fullname</b> <span class="badge badge-secondary float-right">$artist</span></li>

EOL;
}
}else{
	echo "No results. Try Album Title or Artist.";}
}


?>