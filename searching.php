<?php
/*
connect to the database and retrieve data, which will be stored in the $_SESSION constant along with
the redirection back to the previous page.
we can set the result as a buffer in the server using the variable of $_SEESION.
then when users query data using the same keywords and keywords type, we can retrieve data from
this buffer quickly
*/

session_start();
if(!isset($_GET['keywordsInput'])||!isset($_GET['keywordsType'])){
    //redirect the page if the inputs from users are invalid
  header("Location:searchingResult.php");
  die;
}

  //set the $_SESSION variables
if(isset($_GET['page']))
  $_SESSION['page']=(int)$_GET['page'];
else
  $_SESSION['page']=1;

if(!isset($_SESSION['keywordsInput'])||!isset($_SESSION['keywordsType'])){
  $_SESSION['keywordsInput']=$_GET['keywordsInput'];
  $_SESSION['keywordsType']=$_GET['keywordsType'];
}

//if the keywords are the same and the buffer is not null, retrive the data from the buffer
if($_SESSION['keywordsInput']==$_GET['keywordsInput']&&isset($_SESSION['resultBuffer'])){
  //retrive data from the buffer
  $_SESSION['result']=processHtml($_SESSION['resultBuffer'],$_SESSION['page']);
  //redirection
  header("Location:searchingResult.php");
  die;
}

$keywordsArray=processString($_GET['keywordsInput']);
$_SESSION['resultBuffer']=makeConnection($keywordsArray,$_SESSION['keywordsType']);
$_SESSION['resultSet']=processHtml($resultSet,$_SESSION['page']);
//redirection
header("Location:searchingResult.php");

function processString($keywords){
    //this function is used to split input string into separate words by regular expression
    //assume that the key words are separated by spaces(one or more)
    $pattern="/\s+/";
    $separatedWords=preg_split($pattern, $keywords);
    return $separatedwords;
}
function makeConnection($keywords,$keywordsType){
    //make a connection and a query to database and return the result set
    $host='localhost';$user;$password;
    $conn=new mysqli($host,$user,$password);
    if(mysqli_connect_errno())
        return null;
    //
    else{
    $sql="select * from kol where lower($keywordsType)";
    foreach ($keywords as $word)
        $sql=$sql."like lower('$word') and";
    $sql=$sql." 1=1";
    $conn->query($sql);
    $result=$conn->store_result();
    $conn->close();
    return $result;
    }
}
function processHtml(mysqli_result $resultSet,int $page){
  $html="";$temp="";
  //valify the value of page
  if ($page>$resultSet->num_rows/20+1||$page<1) $page=1;
  $resultSet->data_seek(($page-1)*20);
  for($count=0;$count<20;$count++){
    //add html tags into fetched record
    $temp=$resultSet->fetch_assoc();
    $name=$temp['name'];
    $picturePath=$temp['picturePath'];
    $kolId=$temp['kolId'];
    $description=$temp['description'];
    $html=$html."<div>
      <div style='float:left'>
        <img src='$picturePath' alt='$name's picture'/>
        <a href='$kolId'></a>
      </div>
      <div>$description</div>
    </div>";
  }
  return $html;
}
?>
