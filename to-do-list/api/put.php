<?php
$url = "http://localhost/todo/api/task.php/8"; // modifier le produit 1
$data = array('nom' => 'Ceci est une tache mise a jour');
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
$response = curl_exec($ch);
var_dump($response);
if (!$response)
{
    return false;
}
?>