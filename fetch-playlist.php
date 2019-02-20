<?php
$dir = $_GET["name"];
$files = array_slice(scandir("./playlists/$dir"), 2);
echo json_encode($files);

?>