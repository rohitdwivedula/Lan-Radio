<?php 
$message = $_GET["message"];
$message = htmlspecialchars($message);
$username = $_GET["username"];
$newEntry = (object) [
	"username"=>$username,
	"message"=>$message,
];
$file = fopen("chat.json", "r") or die("{\"errorMessage\":false\"}");
$chat = fread($file,filesize("chat.json"));
$chat = json_decode($chat);
fclose($file);
array_push($chat->texts,$newEntry);
$file_write = fopen("chat.json", "w") or die("{\"errorMessage\":false\"}");
fwrite($file_write,json_encode($chat));

echo "Message $message sent";
?>