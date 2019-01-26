<?php 
$chat = fopen("chat.json", "r") or die("{\"errorMessage\":false\"}");
echo fread($chat,filesize("chat.json"));
?>