<?php

function getConnexion(){

    try{
        return new PDO("mysql:host=localhost;dbname=task;charset=utf8","root","root");
    }
    catch(Exception $e){
        die("Erreur BDD");
    }
}

?>