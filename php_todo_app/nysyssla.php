<?php

$attgöra = $_POST["att_göra"] ?? "";
$attgöra = trim($attgöra);

if($attgöra){
  if (file_exists("attgöra.json")){
  $json = file_get_contents("attgöra.json");
  $jsonArray = json_decode($json, true);
} else {
  $jsonArray = [];
}
  $jsonArray[$attgöra] = ["avklarad" => false];
  file_put_contents("attgöra.json", json_encode($jsonArray, JSON_PRETTY_PRINT));
}

header("Location: index.php");



 ?>
