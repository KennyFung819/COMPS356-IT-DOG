<?php
require_once 'configs.php';

/*create kolName, gender, and confirm gender variables
and their error variables with empty strings*/
$kolName="";
$kolName_error="";
$gender="";
$gender_error="";
$platform="";
$platform_error="";
$follower="";
$follower_error="";
$intro="";
$intro_error="";
$sub_count="";
$sub_count_error="";
$category="";
$category_error="";
$video="";
$video_error="";

//process data when it is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //make sure the kolName is not empty
    if(empty(trim($_POST['kolName']))){
        $kolName_error = "Cannot be blank";
    } else{
        //prepare a SELECT query for later use
        $aQuery = "SELECT name FROM kol WHERE name = ?";
        //"stmt" stands for "statement"
        if($stmt = mysqli_prepare($connection, $aQuery)){
            //link an empty parameter to the incomplete statement
            mysqli_stmt_bind_param($stmt, "s", $param_kolName);

            //give the value to the parameter and the statement is complete now
            $param_kolName = trim($_POST['kolName']);
            //execute the prepared and complete statement
            if(mysqli_stmt_execute($stmt)){
                //store result
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $kolName_error ="This kolName has already been created.";
                } else{
                    $kolName = trim($_POST['kolName']);
                }
            } else{
                echo "Your network is busy, please try again later";
            }
        }
        //disconnect it
        mysqli_stmt_close($stmt);
    }

    //make sure the gender is not empty
    if(empty(trim($_POST['gender']))){
        $gender_error = "Cannot be blank";
    } else if(strlen(trim($_POST['gender'])) >8 ){
        $gender_error = "Gender must not be larger thant 8.";
    } else{
        $gender = trim($_POST['gender']);
    }

    //make sure the confirm plat is not empty
    if(empty(trim($_POST['platform']))){
        $platform_error = "Cannot be blank";
    } else if(strlen(trim($_POST['platform'])) > 15){
        $intro_error = "Platform must not exceed 15 character.";
    }    else{
        $platform = trim($_POST['platform']);
	}

    //make sure the intro is not empty
    if(empty(trim($_POST['intro']))){
        $intro_error = "Cannot be blank";
    } else if(strlen(trim($_POST['intro'])) > 300){
        $intro_error = "Intro must not exceed 300 character.";
    } else{
        $intro = trim($_POST['intro']);
    }

    //make input not >10
    if(strlen(trim($_POST['follower'])) > 10){
    $follower_error = "Intro must not exceed 10 digit.";
    } else{
    $follower = trim($_POST['follower']);}

    //make input not >10
    if(strlen(trim($_POST['sub_count'])) > 10){
        $sub_count_error = "Subscriber count must not exceed 10 digit.";
    } else{
        $sub_count = trim($_POST['sub_count']);
    }

    //make input not >20
    if(strlen(trim($_POST['category'])) > 20){
        $category_error = "Catergory must not exceed 10 digit.";
    } else{
        $category = trim($_POST['category']);
    }

    $video = trim($_POST['video']);

    //double-check the must not variable is not empty
	//if any conditions above are not satified, they will not be empty
    if(empty($kolName_error) && empty($gender_error) && empty($platform_error)){

        //prepare a INSERT query for later use
        $aQuery3 = "INSERT INTO kol (id,name, gender,platform,follower,intro,sub_count,category,video_url) VALUES (?,?,?,?,?,?,?,?,?)";
        $maxQuery = $connection->query("SELECT id FROM kol");
        $max = $maxQuery->num_rows +1;
        $maxQuery->close();
        if($stmt = $connection->prepare($aQuery3)){
            //link the empty parameters to the incomplete statement
            $stmt->bind_param('isssisiss' ,$param_id,$param_kolName,$param_gender,$param_platform,$param_follower,$param_intro,$param_sub,$param_category,$param_video);

            //give the values to the parameters and the statement is complete now
            $param_id = $max;
            $param_kolName = $kolName;
            $param_gender = $gender;
            $param_platform =$platform;
            $param_follower= intval($follower);
            $param_intro = $intro;
            $param_sub = intval($sub_count);
            $param_category = $category;
            $param_video = $video;

            //execute the prepared and complete statement
            try{
                $stmt->execute();
                $stmt->close();
                //redirect to login page
                header('location: success_created.php');
            }
            catch (Exception $e){
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
    }

}
	//disconnect $connection
    mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once "../common/head.html"?>
<body>

<?php require_once "../common/navbar.php" ?>
<section id="registration">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-primary">Creating a KOL you think we missed</h2>
              <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="form-group">
                        <div class="form-group row">
                            <label class="col-lg-3 col-sm-4" for="kolName">KOL Name:</label>
                            <input class="form-control col-lg-6 col-sm-8" type="text" name="kolName" id="kolName" value="">
                            <span class="text-warning col-lg-3 col-sm-12"><?php echo $kolName_error; ?></span>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-sm-4" for="gender">Gender:</label>
                            <input class="form-control col-lg-6 col-sm-8" type="text" name="gender" id="gender" value="">
                            <span class="text-warning col-lg-2 col-sm-12"><?php echo $gender_error; ?></span>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-sm-4" for="platform">Platform:</label>
                            <input class="form-control col-lg-6 col-sm-8" type="text" name="platform" id="platform" value="">
                            <span class="text-warning col-lg-2 col-sm-12"><?php echo $platform_error; ?></span>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-sm-4" for="intro">Intro:</label>
                            <input class="form-control col-lg-6 col-sm-8" type="text" name="intro" id="intro" value="">
                            <span class="text-warning col-lg-2 col-sm-12"><?php echo $intro_error; ?></span>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-sm-4" for="follower">Social Media Follower (Twitter):</label>
                            <input class="form-control col-lg-6 col-sm-8" type="text" name="follower" id="follower" value="">
                            <span class="text-warning col-lg-2 col-sm-12"><?php echo $follower_error; ?></span>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-sm-4" for="sub_count">Subcriber Count:</label>
                            <input class="form-control col-lg-6 col-sm-8" type="text" name="sub_count" id="sub_count" value="">
                            <span class="text-warning col-lg-2 col-sm-12"><?php echo $sub_count_error; ?></span>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-sm-4" for="category">Category:</label>
                            <input class="form-control col-lg-6 col-sm-8" type="text" name="category" id="category" value="">
                            <span class="text-warning col-lg-2 col-sm-12"><?php echo $category_error; ?></span>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-sm-4" for="video">Video Url:</label>
                            <input class="form-control col-lg-6 col-sm-8" type="text" name="video" id="video" value="">
                            <span class="text-warning col-lg-2 col-sm-12"><?php echo $video_error; ?></span>
                        </div>
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" value="Submit">
                        <input class="btn btn-secondary" type="reset" value="Reset">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php require_once "../common/javascript.html"?>
</body>
</html>