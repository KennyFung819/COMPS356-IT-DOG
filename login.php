<?php
require_once 'configs.php';
 
/*create username, password variables 
and their error variables with empty strings*/
$username="";
$password="";
$username_error="";
$password_error="";
 
//process data when it is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
    //make sure the username is not empty
    if(empty(trim($_POST['username']))){
        $username_error = "Cannot be blank";
    } else{
        $username = trim($_POST['username']);
    }
    
    //make sure the password is not empty
    if(empty(trim($_POST['password']))){
        $password_error = "Cannot be blank";
    } else{
        $password = trim($_POST['password']);
    }
    
    //double-check the error variables are empty. 
    if(empty($username_error) && empty($password_error)){
        //prepare a SELECT query for later use
        $aQuery3= "SELECT username, password FROM userinfo WHERE username = ?";
        
        if($stmt = mysqli_prepare($connection, $aQuery3)){
            //link an empty parameter to the incomplete statement
            mysqli_stmt_bind_param($stmt, 's', $param_username);
            
            //give the value to the parameter and the statement is complete now
            $param_username = $username;
            
            //execute the prepared and complete statement
            if(mysqli_stmt_execute($stmt)){
                //store result
                mysqli_stmt_store_result($stmt);
                
                //make sure the username exists. If so then verify the password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    //link the result to the statement
					
                    mysqli_stmt_bind_result($stmt, $username);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password)){
                            //if the password is correct, start a session and save the username to it
                            session_start();
                            $_SESSION['username'] = $username;      
                            header("location: mainpage.php");
                        } else{
                            //tell the user that the username and password do not match
                            $password_error = "The password is incorrect. Please try again";
                        }
                    }
                }  else{
                    // Display an error message if username doesn't exist
                    $username_error = "No account found with that username.";
					}
            } else{
                echo "Your network is busy, please try again later";
            }
        }
        
        //disconnect $stmt
        mysqli_stmt_close($stmt);
    }
    
    //disconnect $connection
    mysqli_close($connection);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
</head>
<body>
    <div>
        <h2>Log in to the system</h2>
        <p>Please enter your username and password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="">
                <span><font color="red"><?php echo $username_error; ?></font></span>
            </div>    
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control">
                <span><font color="red"><?php echo $password_error; ?></font></span>
            </div>
            <div>
                <input type="submit" value="Submit">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>    
</body>
</html>