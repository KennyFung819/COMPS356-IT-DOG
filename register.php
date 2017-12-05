<?php
require_once 'configs.php';
 
/*create username, password, and confirm password variables 
and their error variables with empty strings*/
$username="";
$password="";
$confirm_password="";
$username_error="";
$password_error="";
$confirm_password_error="";
 
//process data when it is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
    //make sure the username is not empty
    if(empty(trim($_POST['username']))){
        $username_error = "Cannot be blank";
    } else{
        //prepare a SELECT query for later use
        $aQuery = "SELECT username FROM userinfo WHERE username = ?";
        //"stmt" stands for "statement"
        if($stmt = mysqli_prepare($connection, $aQuery)){
            //link an empty parameter to the incomplete statement
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            //give the value to the parameter and the statement is complete now
            $param_username = trim($_POST['username']);
            
            //execute the prepared and complete statement
            if(mysqli_stmt_execute($stmt)){
                //store result
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_error = "This username has already been taken.";
                } else{
                    $username = trim($_POST['username']);
                }
            } else{
                echo "Your network is busy, please try again later";
            }
        }
         
        //disconnect it
        mysqli_stmt_close($stmt);
    }
    
    //make sure the password is not empty
    if(empty(trim($_POST['password']))){
        $password_error = "Cannot be blank";     
    } else if(strlen(trim($_POST['password'])) < 6){
        $password_error = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    
    //make sure the confirm password is not empty
    if(empty(trim($_POST['confirm_password']))){
        $confirm_password_error = "Cannot be blank";     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_error = 'Password did not match.';
        }
	}
    
    //double-check the error variables are empty. 
	//if any conditions above are not satified, they will not be empty
    if(empty($username_error) && empty($password_error) && empty($confirm_password_error)){
        
        //prepare a INSERT query for later use
        $aQuery2 = "INSERT INTO userinfo (username, password) VALUES (?, ?)";
        
        if($stmt = mysqli_prepare($connection, $aQuery2)){
            //link the empty parameters to the incomplete statement
            mysqli_stmt_bind_param($stmt, 'ss', $param_username, $param_password);
            
            //give the values to the parameters and the statement is complete now
            $param_username = $username;
            $param_password = $password;
            
            //execute the prepared and complete statement
            if(mysqli_stmt_execute($stmt)){
                //redirect to login page
                header('location: login.php');
            } else{
                echo "Your network is busy, please try again later";
            }
        }
         
        //disconnect $stmt
        mysqli_stmt_close($stmt);
    }

}
	//disconnect $connection
    mysqli_close($connection);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
</head>
<body>
    <div>
        <h2>Creating your account</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="">
                <span><font color="red"><?php echo $username_error; ?></font></span>
            </div>    
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" value="">
                <span><font color="red"><?php echo $password_error; ?></font></span>
            </div>
            <div>
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" id="confirm_password" value="">
                <span><font color="red"><?php echo $confirm_password_error; ?></font></span>
            </div>
            <div>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Log in here</a>.</p>
        </form>
    </div>    
</body>
</html>