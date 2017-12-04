
<?php
$servername='localhost';
$username = 'root';
$password = 'Kappa819';
$db ='project';

$mysql = new mysqli($servername, $username, $password, $db);


if ($mysql->connect_error){
    die("connection failed:" . $mysql->connect_error);
}


class content{
    private $subtitle =array();
    private $content =array();
    private $max;

    //Setter & Getter for SubTitle
    public function getSubTitle($sid){
    echo $this->subtitle[$sid];
}
    public function setSubTitle($subtitle,$sid){
        $this->subtitle[$sid]=$subtitle;
    }
    public function getContent($sid){
        echo $this->content[$sid];
    }
    public function setContent($content,$sid){
        $this->content[$sid]= $content;
    }
    public function getMax(){
        return $this->max;
    }
    public function setMax($max){
        $this->max= $max;
    }



    public function searchTarget($pid) {

        global $mysql;

        $target_temp = "SELECT subtitle,content,load_order FROM wiki WHERE pid='$pid' ORDER BY load_order";

        $max = $mysql->query($target_temp)->num_rows;

        $this->setMax($max);


        if ($target= $mysql->query($target_temp)) {
            // output data of each rowz
            while($row = $target->fetch_assoc()) {
                $this->setSubTitle($row["subtitle"],$row["load_order"]);
                $this->setContent($row["content"],$row["load_order"]);
            }
            $target->free();
        }
    }
    public function findTarget(){
        $pid=$_GET['targetKol'];
        $this->searchTarget($pid);
    }


}
?>