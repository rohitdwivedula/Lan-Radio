<?php 

var name_of_zipfile = "Sample.zip";

$output = shell_exec("
mkdir hello
chmod -R 777 hello
echo \"Done\"


	");
var_dump($output);


?>