
<?php
$servername='localhost';
$username = 'root';
$password = '';
$db ='project';

$mysql = new mysqli($servername, $username, $password, $db);


if ($mysql->connect_error){
    die("connection failed:" . $mysql->connect_error);
}


class kol{
    private $name;
    private $gender;
    private $platform;
    private $category;
    private $follwer;
    private $img_url;
    private $intro;
    private $sub_count;
    private $video;

    //Setter & Getter for Name
    public function getName(){
        echo $this->name;
    }
    public function setName($name){
        $this->name=$name;
    }

    //Setter & Getter for Gender
    public function getGender(){
        echo $this->gender;
    }
    public function setGender($gender){
        $this->gender=$gender;
    }

    //Setter & Getter for Platform
    public function getPlatform(){
        echo $this->platform;
    }
    public function setPlatform($platform){
        $this->platform=$platform;
    }

    //Setter & Getter for Category
    public function getCategory(){
        echo $this->category;
    }
    public function setCategory($category){
        $this->category=$category;
    }

    //Setter & Getter for Follower
    public function getFollower(){
        echo $this->follwer;
    }
    public function setFollower($follower){
        $this->follwer=$follower;
    }

    //Setter & Getter for sub_count
    public function getSub(){
        echo $this->sub_count;
    }
    public function setSub($sub_count){
        $this->sub_count=$sub_count;
    }


    //Setter & Getter for img_url
    public function getImg_url(){
        echo $this->img_url;
    }
    public function setImg_url($img_url){
        $this->img_url=$img_url;
    }

    //Setter & Getter for video_url
    public function getVideo(){
        echo $this->video;
    }
    public function setVideo($video){
        $this->video=$video;
    }

    //Setter & Getter for intro
    public function getIntro(){
        echo $this->intro;
    }
    public function setIntro($intro){
        $this->intro=$intro;
    }

    public function searchTarget($id) {
        $target_temp = "SELECT name, gender,platform,category,img_url,video_url,follower,sub_count,intro FROM kol WHERE id='$id'";

        global $mysql;
        $result= $mysql->query($target_temp);
        $row= $result->fetch_assoc();
        $this->setName($row["name"]);
        $this->setGender($row["gender"]);
        $this->setPlatform($row["platform"]);
        $this->setCategory($row["category"]);
        $this->setFollower($row["follower"]);
        $this->setImg_url($row["img_url"]);
        $this->setVideo($row["video_url"]);
        $this->setSub($row["sub_count"]);
        $this->setIntro($row["intro"]);
        $result->close();
    }
    public function findTarget(){
        $id=$_GET['targetKol'];
        $this->searchTarget($id);
    }


}
?>