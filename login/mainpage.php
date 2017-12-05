<?php
//start the session
session_start();

//if the session expires the user will be redirected to the Login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body>
    <div>
        <h1>Hi, <b><?php echo $_SESSION['username']; ?></b>. Welcome to our site!</h1>
    </div>
    <p><a href="logout.php">Sign out of your account</a></p>
</body>
</html>