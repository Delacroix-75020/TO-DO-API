<?php
$url = "https://infra.ofii.fr/services/alternance/todo-list/api/task.php/2"; // modifier la tâche 2
$data = array('nom' => 'Le Test Update');
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