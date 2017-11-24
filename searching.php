<?php
/**
*connect to the database and retrieve data, which will be stored in the $_SESSION constant along with
*the redirection back to the previous page.
*we can set the result as a buffer in the server using the variable of $_SEESION.
*then when users query data using the same keywords and keywords type, we can retrieve data from
*this buffer quickly
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

//if the keywords are the same with the previous input and the buffer is not null, retrive the data from the buffer
if($_SESSION['keywordsInput']==$_GET['keywordsInput']&&isset($_SESSION['resultBuffer'])){
  //retrive data from the buffer
  $_SESSION['result']=processHtml($_SESSION['resultBuffer'],$_SESSION['page']);
  //redirection
  header("Location:searchingResult.php");
  die;
}

$keywordsArray=processString($_GET['keywordsInput']);
$_SESSION['resultBuffer']=makeConnection($keywordsArray,$_SESSION['keywordsType']);
$_SESSION['resultSet']=processHtml($_SESSION['resultBuffer'],$_SESSION['page']);
//redirection
header("Location:searchingResult.php");

/**
*this function is used to split input string into separate words by regular expression
*assume that the key words are separated by spaces(one or more)
*/
function processString($keywords){

    $pattern="/\s+/";
    $separatedWords=preg_split($pattern, $keywords);
    return $separatedwords;
}

/**
*make a connection and a query to database and return the result set
*/
function makeConnection($keywords,$keywordsType){

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
    if($result->num_rows==0)
      return null;
    $conn->close();
    return $result;
    }
}
/**
*process the result and return string with html tags
*/
function processHtml(mysqli_result $resultSet,int $page){
  $html="";$temp="";

  //valify whether the result is null or not
  if($resultSet==null){
    $html="<p>the kol you want to search doesn't exist, please try other keywords</p>";
    return $html;
  }
    //valify the value of page
  if ($page>$resultSet->num_rows/20+1||$page<1) $page=1;
  $resultSet->data_seek(($page-1)*20);
  for($count=0;$count<20;$count++){
    //add html tags into fetched record
    $temp=$resultSet->fetch_assoc();
    $name=$temp['name'];
    $picturePath=$temp['img_url'];
    $kolId=$temp['id'];
    $description=$temp['intro'];
    $html=$html."
      <div class='row'>
      <div class='col-lg-3 col-md-6'>
        <img src='$picturePath' alt='$name's picture'/>
        <a href=wiki.php?id='$kolId'><h4>$name</h4></a>
      </div>
      <div><p class='text-muted mb-0'>$description</p></div>
      </div>";
  }
  return $html;
}
?>
