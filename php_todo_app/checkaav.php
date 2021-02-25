<?php

$json = file_get_contents("attgöra.json");
$jsonArray = json_decode($json, true);

$att_göra = $_POST["todo"];
$jsonArray[$att_göra]["avklarad"] = !$jsonArray[$att_göra]["avklarad"];

file_put_contents("attgöra.json", json_encode($jsonArray, JSON_PRETTY_PRINT));

header("Location: index.php");

 ?>
