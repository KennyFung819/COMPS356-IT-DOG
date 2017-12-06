<?php
require_once 'configs.php';
 
/*create username, password variables 
and their error variables with empty strings*/
$username="";
$password="";
$username_error="";
$password_error="";
$DB_user_password="";
 
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
        $aQuery3= "SELECT name, password FROM user_data WHERE name = ?";
        
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
                    mysqli_stmt_bind_result($stmt, $username, $DB_user_password);
                    if(mysqli_stmt_fetch($stmt)){
						if($DB_user_password==$password){
                            //if the password is correct, start a session and save the username to it
                            session_start();
                            $_SESSION['username'] = $username;      
                            header("location: ../main/index.php");
						}
						else{
                            //tell the user that the username and password do not match
                            $password_error = "The password is incorrect. Please try again";
                        }
                    } 
                
                }  else{
                    //tell the user that the username do not exist
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


<?php require_once "../common/head.html"?>

<body>

<?php require_once '../common/navbar.php' ?>
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-primary">Log in to KOLpedia</h2>
                    <p class="text-secondary">Please enter your username and password at the field below.</p>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="form-group">
                            <div class="form-group row">
                                <label class="col-lg-3 col-sm-4" for="username">Username:</label>
                                <input class="form-control col-lg-6 col-sm-8" type="text" name="username" id="username" value="">
                                <span class="text-warning col-lg-3 col-sm-12"> <?php echo $username_error; ?></span>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-sm-4" for="password">Password:</label>
                                <input class="form-control col-lg-6 col-sm-8" type="password" name="password" id="password" value="">
                                <span class="text-warning col-lg-3 col-sm-12"> <?php echo $password_error; ?></span>
                            </div>
                        </div>
                        <div>
                            <input class="btn btn-success" type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class=" text-muted text-center">Don't have an account? <a href="register.php">Sign up now</a>.</p>
                </div>
            </div>
        </div>
    </section>

<?php require_once "../common/javascript.html"?>
</body>
</html>