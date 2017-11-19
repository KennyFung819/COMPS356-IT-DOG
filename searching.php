<?php
/*
link to the database and retrieve data, which will be stored in the $_post constant along with 
the redirection back to the previous page.
*/
$keywordsString=processString($_GET['keywordsInput']);
$resultSet=makeConnection($keywordsString);
$_POST['result']=returnResult($resultset);
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
    $conn=mysqli_connect($host,$user,$password);
    if(!$conn)
        return null;
    //
    else{
    $sql="select * from kol where ";
    foreach ($keywords as $word)
        $sql=$sql."like '$word' and";
    $sql=$sql." 1=1 limit 100";
    mysqli_query($conn, $sql);
    $result=mysqli_execute($sql);
    mysqli_close($conn);
    return $result;
    }
}
function returnResult($resultWithoutHtml){
    //return the result to the previous page with added html tags 
    $htmlText;
    return $htmlText;
}
?>