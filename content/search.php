
<?php
$servername='localhost';
$username = 'root';
$password = 'Kappa819';
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

    public function getName(){
        echo $this->name;
    }

    public function setName($name){
        $this->name=$name;
    }

    public function getGender(){
        echo $this->gender;
    }

    public function setGender($gender){
        $this->gender=$gender;
    }
    public function getPlatform(){
        echo $this->platform;
    }

    public function setPlatform($platform){
        $this->platform=$platform;
    }
    public function getCategory(){
        echo $this->category;
    }

    public function setCategory($category){
        $this->category=$category;
    }


    public function searchTarget($id) {

        $target_temp = "SELECT name, gender,intro,platform FROM kol WHERE id='$id'";

        global $mysql;

        $target= $mysql->query($target_temp);

        if ($target->num_rows > 0) {
            // output data of each rowz
            while($row = $target->fetch_assoc()) {
                $this->setName($row["name"]);
                $this->setGender($row["gender"]);
                $this->setPlatform($row["platform"]);
                $this->setCategory($row["name"]);
            }
        }
    }
    public function findTarget(){
        $id=$_GET['targetKol'];
        $this->searchTarget($id);
    }


}
?>