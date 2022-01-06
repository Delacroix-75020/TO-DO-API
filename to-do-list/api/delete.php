<?php
$url = "http://localhost/todo/api/task.php/4"; // supprimer le produit 4 "Tondre la pelouse"
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "delete");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response  = curl_exec($ch);
var_dump($response);
curl_close($ch);
?>