<?php
//start the session
session_start();
 
//unset all the session variables
$_SESSION = array();
 
//delete the session
session_destroy();
 
//redirect to the Login page
header("location: success_logout.php");
exit();
?>