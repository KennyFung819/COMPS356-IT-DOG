<?php
$servername='localhost';
$username = 'root';
$password = 'Kappa819';
$db ='project';

$conn = new mysqli($servername, $username, $password, $db);


if ($conn->connect_error){
    die("connection failed:" . $conn->connect_error);
}

$target = "PewDiePie";

$kol = "SELECT name, gender,intro,platform FROM kol WHERE name ='$target'";

$title = $conn->query($kol);

if ($title->num_rows > 0) {
    // output data of each row
    while($row = $title->fetch_assoc()) {
        echo "name: " . $row["name"]. "\n | gender: " . $row["gender"]. "\n | platform: " . $row["platform"]. "\n | intro: " . $row["intro"]. "\n |";
    }
} else {
    echo "0 results";
}
?>