<?php
/**
*this file will connect to database every time when it is accessed by Users
*it will generate resultset with no more than 20 records at once and make a redirection to the searchingresult.php
*it will also generate page list for users to read another 20 records.
*/

session_start();
if (!isset($_GET['keywordsInput'])||!isset($_GET['keywordsType'])) {
    //redirect the page if the inputs from users are invalid
    header("Location:searchingResult.php");
    die;
}

  //set the $_SESSION variables
if (isset($_GET['page'])) {
    $_SESSION['page']=(int)$_GET['page'];
} else {
    $_SESSION['page']=1;
}

if (!isset($_SESSION['keywordsInput'])||!isset($_SESSION['keywordsType'])) {
    $_SESSION['keywordsInput']=$_GET['keywordsInput'];
    $_SESSION['keywordsType']=$_GET['keywordsType'];
}

//if the keywords are the same with the previous input and the buffer is not null, retrive the data from the buffer


$_SESSION['keywordsInput']=$_GET['keywordsInput'];
$_SESSION['keywordsType']=$_GET['keywordsType'];
$keywordsArray=processString($_SESSION['keywordsInput']);
$_SESSION['resultBuffer']=makeConnection($keywordsArray, $_SESSION['keywordsType']);
if($_SESSION['resultBuffer']!=null){
$_SESSION['resultSet']=processHtml($_SESSION['resultBuffer'], $_SESSION['page']);
$_SESSION['pages']=processPages($_SESSION['resultBuffer'],$_SESSION['page']);
$_SESSION['resultBuffer']->free_result();
}
else {
  $_SESSION['resultSet']="<p>the kol you want to search doesn't exist, please try other keywords</p>";
  $_SESSION['page']=null;
}
//redirection
header("Location:searchingResult.php?keywordsInput=".$_SESSION['keywordsInput']."&keywordsType=".$_SESSION['keywordsType']."&page=".$_SESSION['page']);

/**
*this function is used to split input string into separate words by regular expression
*assume that the key words are separated by spaces(one or more)
*/
function processString($keywords)
{
    $pattern="/[\s]+/";
    $keywords=trim($keywords);
    $separateWords=preg_split($pattern, $keywords);
    foreach ($separateWords as $word) {
      echo $word."<br>";
    }
    return $separateWords;
}

/**
*make a connection and a query to database and return the result set
*/
function makeConnection(Array $keywords, $keywordsType)
{
  echo "making connection<br>";
    $host='localhost';
    $user='root';
    $password='';
    $database='project';
    $port=3306;
    $conn=new mysqli($host, $user, $password, $database, $port);
    if (mysqli_connect_errno()) {
      echo "cannot open the connection";
        return null;
    }
    //
    else {
      echo "connect successfully<br>";
        $sql="select id,name,img_url,intro from kol where ";
        foreach ($keywords as $word) {
            $sql=$sql."lower($keywordsType) like lower('%$word%') and ";
        }
        $sql=$sql." 1=1";
        echo $sql;
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $stmt->store_result();
        //$result=$conn->store_result();
        echo "<br>the num of rows is ".$stmt->num_rows."<br>";
        if ($stmt->num_rows==0) {
          echo $result->num_rows;
            return null;
        }
        $conn->close();
        echo "<br>the result number now is".$stmt->num_rows."<br>";
        return $stmt;
    }
}
/**
*process the result and return string with html tags
*/
function processHtml(mysqli_stmt $resultSet, int $page)
{
  echo "entering the processhtml function<br>";
  echo "the page is ".$page."<br>";
    $html="";
    $temp="";

    //valify the value of page
    if ($page>$resultSet->num_rows/20+1||$page<1) {
        $page=1;
    }
    $resultSet->data_seek(($page-1)*20);
    $resultSet->bind_result($kolId,$name,$picturePath,$intro);
    for ($count=0;$count<20;$count++) {
        //add html tags into fetched record
        if(!$resultSet->fetch())
          break;
        $html=$html."
      <div class='row'>
      <div class='col-lg-3 col-md-6 text-center'>
      <a href=../content/index.php?targetKol=$kolId>
        <img src='../$picturePath' alt='$name's picture' height='200'/>
        <h4>$name</h4></a>
      </div>
      <div class='col-lg-9 col-md-6 text-center'><p class='text-muted mb-0'>$intro</p></div>
      </div>";
    }
    echo $html;
    return $html;
}
function processPages(mysqli_stmt $resultset,int $page){
      $keywordsInput=$_SESSION['keywordsInput'];
      $keywordsType=$_SESSION['keywordsType'];
      $count;$pageHtml='';
      if ($page>=5) {
          $count=$_SESSION-4;
      } else {
          $count=1;
      }
      $pages=(int)($resultset->num_rows/20)+1;
      $pageHtml="<div><hr></div><span class='col-lg-5 col-md-6 text-right text-muted'>select pages here ▶ </span><ul class='pagination col-lg-7 col-md-6'>";
      if ($page!=1) {
          echo "<li><a href='searchingResult.php?keywordstype=$keywordsType&keywordsInput=$keywordsInput&page=".($page-1)."'>previous page</a></li>";
      }
      for ($times=0;$times<10&&$count<=$pages;$count++,$times++) {
          if ($count==$page) {
              $pageHtml=$pageHtml."<li><a href='#'>$count</a></li>";
          } else {
              $pageHtml=$pageHtml."<li><a href='searchingResult.php?keywordstype=$keywordsType&keywordsInput=$keywordsInput&page=$count'>$count</a></li>";
          }
      }
      echo "the number of total pages is".$pages;
      if ($page<$pages) {
          $pageHtml=$pageHtml."<li><a href='searchingResult.php?keywordstype=$keywordsType&keywordsInput=$keywordsInput&page=".($page+1)."'>next page</a></li>";
      }
      $pageHtml=$pageHtml."</ul>";
      return $pageHtml;
}
?>
