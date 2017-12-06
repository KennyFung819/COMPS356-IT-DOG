<?php

class randomPage{
    private $random;
function __construct(){
    $servername='localhost';
    $username = 'root';
<<<<<<< HEAD
    $password = 'Kappa819';
=======
    $password = '';
>>>>>>> master
    $db ='project';

    $mysql = new mysqli($servername, $username, $password, $db);

    $target_temp = "SELECT id FROM kol";

    $max = $mysql->query($target_temp)->num_rows;

    if ($mysql->connect_error){
        die("connection failed:" . $mysql->connect_error);
    }

    $local_random = strval(rand(1,$max));

    $this->setRandom($local_random);

}

function setRandom($random){
    $this->random =$random;
}
function getRandom(){
    echo $this->random;
}
}
?>