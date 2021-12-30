<?php 
#Inclumos una y solo una vez el config.php
//require_once("config.php");

$header  = "view/templates/header.php";
require($header);
$content = "view/indexView.php";
require($content);
$footer  = "view/templates/footer.php";
require($footer);

?>

