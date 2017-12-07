
<?php
$servername='localhost';
$username = 'root';
$password = '';
$db ='project';

$mysql = new mysqli($servername, $username, $password, $db);


if ($mysql->connect_error){
    die("connection failed:" . $mysql->connect_error);
}


class contact{
    private $youtube;
    private $twitter;
    private $twitch;
    private $facebook;
    private $email;
    private $instagram;

    //Setter & Getter for Name
    public function getYoutube(){
        return $this->youtube;
    }
    public function setYoutube($yotube){
        $this->youtube=$yotube;
    }

    public function getTwitch(){
        return $this->twitch;
    }
    public function setTwitch($twitch){
        $this->twitch=$twitch;
    }
    public function getTwitter(){
        return $this->twitter;
    }
    public function setTwitter($twitter){
        $this->twitter=$twitter;
    }
    public function getFacebook(){
        return $this->facebook;
    }
    public function setFacebook($facebook){
        $this->facebook= $facebook;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function getIG(){
        return $this->instagram;
    }
    public function setIG($instagram){
        $this->instagram=$instagram;
    }


    //Setter & Getter for intro

    public function searchTarget($id) {
        $target_temp = "SELECT youtube,twitch,twitter,facebook,email,instagram FROM contact WHERE id='$id'";

        global $mysql;
        $result= $mysql->query($target_temp);
        $row= $result->fetch_assoc();
        $this->setYoutube($row["youtube"]);
        $this->setTwitch($row["twitch"]);
        $this->setTwitter($row["twitter"]);
        $this->setEmail($row["email"]);
        $this->setIG($row["instagram"]);
        $this->setFacebook($row["facebook"]);
        $result->close();
    }
    public function findTarget(){
        $id=$_GET['targetKol'];
        $this->searchTarget($id);
    }


}
?>