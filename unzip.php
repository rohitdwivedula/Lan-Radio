<?php 

$name_of_zipfile = $_GET["file"];
$full_name = $name_of_zipfile.".zip";
$output = shell_exec(`
unzip "./podcast_songs/$full_name" -d "./podcast_songs/$name_of_zipfile"
chmod -R 777 "./podcast_songs/$name_of_zipfile"
rm "./podcast_songs/$full_name"

	`);
var_dump($output);


?>