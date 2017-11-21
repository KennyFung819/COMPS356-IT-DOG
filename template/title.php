<?php

$servername='localhost';
$username = 'root';
$password = 'Kappa819';
$db ='project';

header('Content-Type: application/json; charset=UTF-8');

$mysql = new mysqli($servername, $username, $password, $db);


if ($mysql->connect_error){
    die("connection failed:" . $mysql->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == "GET") {
    search($mysql);
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    echo json_encode('post');
}


function search($sql) {

    $id="01";

    $target_temp = "SELECT name, gender,intro,platform FROM kol WHERE id='$id'";

    $target= $sql->query($target_temp);

    if ($target->num_rows > 0) {
        // output data of each rowz
        while($row = $target->fetch_assoc()) {
            $kol=array('name'=>$row["name"], 'gender'=>$row["gender"],'platform'=>$row["platform"],'intro'=>$row["intro"]);
            echo json_encode($kol);
        }
    } else {
        echo json_encode(array('msg' => '沒有！'));

    }
}

?>