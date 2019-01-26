<?php 
$chat = fopen("chat.json", "r") or echo("{\"errorMessage":false\"}");
echo fread($chat,filesize("chat.json"));
?>