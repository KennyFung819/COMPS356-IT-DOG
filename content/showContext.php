
<?php
$servername='localhost';
$username = 'root';
$password = 'Kappa819';
$db ='project';

$mysql = new mysqli($servername, $username, $password, $db);


if ($mysql->connect_error){
    die("connection failed:" . $mysql->connect_error);
}


class kolData{
    private $id;
    private $type =array();
    private $context1 =array();
    private $context2 =array();
    private $context3 =array();
    private $context4 =array();
    private $context5 =array();
    private $context6 =array();
    private $indexCount;
    /*
    //Setter & Getter for ID
    public function getID(){
        echo $this->id;
    }
    public function setID($id){
        $this->id=$id;
    }
    */

    //Setter & Getter for Type
    public function getType($id){
        echo $this->type[$id];
    }
    public function setType($type,$id){
        $this->type[$id]=$type;
    }

    //Setter & Getter for Context1
    public function getContext1($id){
        echo $this->context1[$id];
    }
    public function setContext1($context,$id){
        $this->context1[$id]=$context;
    }

    //Setter & Getter for Context2
    public function getContext2($id){
        echo $this->context2[$id];
    }
    public function setContext2($context,$id){
        $this->context2[$id]=$context;
    }

    //Setter & Getter for Context
    public function getContext3($id){
        echo $this->context3[$id];
    }
    public function setContext3($context,$id){
        $this->context3[$id]=$context;
    }

    //Setter & Getter for Context
    public function getContext4($id){
        echo $this->context4[$id];
    }
    public function setContext4($context,$id){
        $this->context4[$id]=$context;
    }

    //Setter & Getter for Context
    public function getContext5($id){
        echo $this->context5[$id];
    }
    public function setContext5($context,$id){
        $this->context5[$id]=$context;
    }

    //Setter & Getter for Context6
    public function getContext6($id){
        echo $this->context6[$id];
    }
    public function setContext6($context,$id){
        $this->context6[$id]= $context;
    }

    public function getCount(){
        return $this->indexCount;
    }
    public function setCount($count){
        $this->indexCount= $count;
    }

    public function searchTarget($pid) {


        $target_temp = "SELECT type,context1,context2,context3,context4,context5,context6 FROM kol_data WHERE pid='$pid'";

        $counter=0;
        global $mysql;


        if ($target= $mysql->query($target_temp)) {
            // output data of each rowz
            while($row = $target->fetch_assoc()) {
                $this->setType($row["type"],$counter);
                $this->setContext1($row["context1"],$counter);
                $this->setContext2($row["context2"],$counter);
                $this->setContext3($row["context3"],$counter);
                $this->setContext4($row["context4"],$counter);
                $this->setContext5($row["context5"],$counter);
                $this->setContext6($row["context6"],$counter);
                $counter++;
            }
            $this->setCount($counter);
            $target->free();
        }
    }
    public function findTarget(){
        $pid=$_GET['targetKol'];
        $this->searchTarget($pid);
    }


}
?>