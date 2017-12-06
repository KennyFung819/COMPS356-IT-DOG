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
        $aQuery = "SELECT name FROM user_data WHERE name = ?";
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
                    $username_error ="This username has already been taken.";
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
        $password_error = "Password must have at least 6 characters.";
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
        $aQuery2 = "INSERT INTO user_data (name, password) VALUES (?, ?)";
        
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

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login to KOLpedia</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/creative.css" rel="stylesheet">

</head>
<body>

<?php include "../navbar/navbar.php" ?>
<section id="registration">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-primary">Creating your account</h2>
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
                            <span class="text-warning col-lg-3 col-sm-12"><?php echo $username_error; ?></span>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-sm-4" for="password">Password:</label>
                            <input class="form-control col-lg-6 col-sm-8" type="password" name="password" id="password" value="">
                            <span class="text-warning col-lg-2 col-sm-12"><?php echo $password_error; ?></span>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-sm-4" for="confirm_password">Confirm Password:</label>
                            <input class="form-control col-lg-6 col-sm-8" type="password" name="confirm_password" id="confirm_password" value="">
                            <span class="text-warning col-lg-2 col-sm-12"><?php echo $confirm_password_error; ?></span>
                        </div>
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" value="Submit">
                        <input class="btn btn-secondary" type="reset" value="Reset">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p class=" text-muted text-center">Already have an account? <a href="login.php">Log in here</a>.</p>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Custom scripts for this template -->
<script src="../js/creative.js"></script>
</body>
</html>