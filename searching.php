<?php
/*
link to the database and retrieve data, which will be stored in the $_SESSION constant along with
the redirection back to the previous page.
we can set the result as a buffer in the server with the static data type
then when we want to read information in other pages we can retrieve data from
this buffer quickly
*/

session_start();
if(!isset($_GET['keywordsInput'])||!isset($_GET['keywordsType'])){
  //redirect the page if the input from users are invalid
}

if(!isset($_SESSION['keywordsInput'])){
  $_SESSION['keywordsInput']=$_GET['keywordsInput'];
}
else if($_SESSION['keywordsInput']==$_GET['keywordsInput']&&isset($_SESSION['resultBuffer'])){
  $_SESSION['result']=processHtml($_SESSION['resultBuffer'],$_GET['page']);
  //redirection
}
else{

}
$keywordsString=processString($_GET['keywordsInput']);

$_SESSION['resultBuffer']=makeConnection($keywordsString);
$_SESSION['resultSet']=processHtml($resultSet,$_GET['page']);


function processString($keywords){
    //this function is used to split input string into separate words by regular expression
    //assume that the key words are separated by spaces(one or more)
    $pattern="/\s+/";
    $separatedWords=preg_split($pattern, $keywords);

    return $separatedwords;
}
function makeConnection($keywords){
    //make a connection and a query to database and return the result set
    $host='localhost';$user;$password;
    $conn=new mysqli($host,$user,$password);
    if(mysqli_connect_errno())
        return null;
    //
    else{
    $sql="select * from kol where ".$_GET['keywordsType'];
    foreach ($keywords as $word)
        $sql=$sql."like '$word' and";
    $sql=$sql." 1=1";
    $conn->query($sql);
    $result=$conn->store_result();
    $conn->close();
    return $result;
    }
}
function processHtml(mysqli_result $resultSet,int $page){
  $html="";$temp="";
  //set the default page of the result set
  if(!isset($page))$page=1;
  elseif ($page>$resultSet->num_rows/20+1||$page<1) {
    $page=1;
  }
  $resultSet->data_seek(($page-1)*20);
  for($count=0;$count<20;$count++){
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
}
?>
