
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
    private $type;
    private $context1;
    private $context2;
    private $context3;
    private $context4;
    private $context5;

    //Setter & Getter for ID
    public function getID(){
        echo $this->id;
    }
    public function setID($id){
        $this->id=$id;
    }

    //Setter & Getter for Type
    public function getType(){
        echo $this->type;
    }
    public function setType($type){
        $this->type=$type;
    }

    //Setter & Getter for Context1
    public function getContext1(){
        echo $this->context1;
    }
    public function setContext1($context){
        $this->context1=$context;
    }

    //Setter & Getter for Context2
    public function getContext2(){
        echo $this->context2;
    }
    public function setContext2($context){
        $this->context2=$context;
    }

    //Setter & Getter for Context
    public function getContext3(){
        echo $this->context3;
    }
    public function setContext3($context){
        $this->context3=$context;
    }

    //Setter & Getter for Context
    public function getContext4(){
        echo $this->context4;
    }
    public function setContext4($context){
        $this->context4=$context;
    }

    //Setter & Getter for Context
    public function getContext5(){
        echo $this->context5;
    }
    public function setContext5($context){
        $this->context5=$context;
    }

    public function searchTarget($pid) {


        $target_temp = "SELECT id, type,context1,context2,context3,context4,context5 FROM kol_data WHERE pid='$pid'";

        global $mysql;

        $target= $mysql->query($target_temp);

        if ($target->num_rows > 0) {
            // output data of each rowz
            while($row = $target->fetch_assoc()) {
                $this->setID($row["id"]);
                $this->setType($row["type"]);
                $this->setContext1($row["context1"]);
                $this->setContext2($row["context2"]);
                $this->setContext3($row["context3"]);
                $this->setContext4($row["context4"]);
                $this->setContext5($row["context5"]);

            }
        }
    }
    public function findTarget(){
        $pid=$_GET['targetKol'];
        $this->searchTarget($pid);
    }


}
?>