
<?php
$servername='localhost';
$username = 'root';
<<<<<<< HEAD
$password = 'Kappa819';
=======
$password = '';
>>>>>>> master
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
    private $img_folder;
    private $intro;

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

    //Setter & Getter for img_url
    public function getImg_folder(){
        echo $this->img_folder;
    }
    public function setImg_folder($img_folder){
        $this->img_folder=$img_folder;
    }

    //Setter & Getter for intro
    public function getIntro(){
        echo $this->intro;
    }
    public function setIntro($intro){
        $this->intro=$intro;
    }

    public function searchTarget($id) {


        $target_temp = "SELECT name, gender,platform,category,img_folder,follower,intro FROM kol WHERE id='$id'";

        global $mysql;

        $target= $mysql->query($target_temp);

        if ($target->num_rows > 0) {
            // output data of each rowz
            while($row = $target->fetch_assoc()) {
                $this->setName($row["name"]);
                $this->setGender($row["gender"]);
                $this->setPlatform($row["platform"]);
                $this->setCategory($row["category"]);
                $this->setFollower($row["follower"]);
                $this->setImg_folder($row["img_folder"]);
                $this->setIntro($row["intro"]);
            }
        }
    }
    public function findTarget(){
        $id=$_GET['targetKol'];
        $this->searchTarget($id);
    }


}
?>