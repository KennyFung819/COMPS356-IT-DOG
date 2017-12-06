<!DOCTYPE HTML>
 <html>
<section class="bg-light text-dark" id="comment">
    <div class="container">
        <?php
        $conn=connectDB();
        if(!$_POST&&$conn&&isset($_GET['targetKol'])){
            $commentText=displayComment($conn,(int)$_GET['targetKol']);
            echo $commentText;
            $conn->close();
        }
        elseif($_POST&&$conn&&isset($_GET['targetKol'])){
            insertComment($conn);
            $commentText=displayComment($conn,(int)$_GET['targetKol']);
            echo $commentText;
            $conn->close();
        }
        ?>
        <?php
        if(!isset($_SESSION['username'])): echo "please <a href='../login/login.php'>log in</a>";
        else: ?>
            <form  method="post">
                <div class="form-group">
                    <div class="form-group">
                        <label for="name" class="col-lg-2  col-form-label text-info">Your name: <span class="text-muted"><?php echo $_SESSION['username'];?></span></label>
                    </div>
                    <div class="form-group row">
                        <label for="comment" class="col-lg-12  col-form-label text-info"> Comments Below:</label>
                        <div class="col-lg-12">
                            <textarea class="form-control" name="userComment" id="comment"></textarea>
                            <p class="text-danger" id="warning" hidden></p>
                        </div>
                    </div>
                    <div class="row">
                        <span class="col-lg-5 col-md-4 col-sm-2"></span>
                        <button type="submit" class="btn btn-primary col-lg-2 col-md-4 col-sm-8" name="submit-comment">Submit</button>
                    </div>
                </div>
            </form>
        <?php endif?>

    </div>
</section>
 </html>

 <?php
 function insertComment(mysqli $mysql)
 {
     if (!isset($_POST['userComment'])||empty($_POST['userComment'])) {
         #POP A ALERT IF USER DO NOT INPUT ANY THING
         alert("The comment should not be empty");
     } elseif (!isset($_SESSION['username'])||empty($_SESSION['username'])) {
        #pop an alert if user do not login
          alert("please login");
        }else {
         #GET THE FORM DATA
         $name = $_SESSION['username'];#user name from session
         $pid=$_GET['targetKol'];
         $comment = str_replace("'", "&apos", trim($_POST["userComment"]));#replace single quotes

         $insert="INSERT INTO comment(id,pid,uname,comment_text,timeofcomment) VALUES( NULL,$pid,$name,$comment,now())";

         #WRITE DOWN COMMENTS#
         if ($mysql->query($insert) === TRUE) {
             alert("comment succeeded!");
         } else {
             alert("comment failed!");
         }
     }
 }
/**
* display the top 5 comments most currently, it will return strings with html tags
* please remenber to close the database connection after invoking this function
*
* @param mysqli $mysql the database connection
* @param int $pid the id of kol
* @return string results with html tags
*/
function displayComment(mysqli $mysql,$pid)
{
    $resultWithHtml="";
    $query="SELECT PID,UNAME,COMMENT_TEXT,TIMEOFCOMMENT FROM COMMENT WHERE PID=$pid  ORDER BY TIMEOFCOMMENT DESC LIMIT 5";
    if($stmt=$mysql->prepare($query)){
      $stmt->execute();
      $stmt->bind_result($pid, $uname, $comment_text, $timeofcomment);
      $stmt->store_result();
      while ($stmt->fetch()) {
        $timeofcomment=strtotime($timeofcomment);
        $timetoprint=date('H:i  M d, Y',$timeofcomment);
        $resultWithHtml=$resultWithHtml."
        <div class='container'>
        <div class='col-md-4 col-lg-4'><h4>$uname</h4></div>
        <div class='col-md-8 col-lg-8'><span>$comment_text</span><p class='text-muted text-center'>$timetoprint</p></div>
        <hr>
        </div>";
      }
    }else{
      $resultWithHtml="<p>There is no comment here. Be the first one!</p>";
    }
        return $resultWithHtml;
    }
function connectDB(){
  #Connet to database
  $servername='localhost';
  $username = 'root';
  $password = '';
  $db ='project';
  $mysql = new mysqli($servername, $username, $password, $db);
  if ($mysql->connect_error) {
      alert("connection failed:" . $mysql->connect_error);
      return null;
  }
  return $mysql;
}
 function alert($msg)
 {
     echo "<script type='text/javascript'>alert('$msg');</script>";
 }
?>
