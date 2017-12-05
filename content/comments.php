<!DOCTYPE HTML>
 <html>
 <?php session_start();?>
 <div class="container">
     <form  method="post">
         <div class="form-group">
             <div class="form-group row">
                 <label for="name" class="col-lg-2  col-form-label"> Your Name:<?php echo $_SESSION['userName'];?>
             </div>
             <div class="form-group row">
                <label for="comment" class="col-lg-12  col-form-label"> Comments: </label>
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
 </div>
 <!-- Bootstrap core JavaScript -->
 <script src="../vendor/jquery/jquery.min.js"></script>
 <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 </html>

 <?php
 function insertComment()
 {
     if (isset($_POST['userComment'])||empty($_POST['userComment'])) {
         #POP A ALERT IF USER DO NOT INPUT ANY THING
         alert("the comment cannot be empty");
         die;
     } elseif (!isset($_SESSION['username'])||isset(empty($_SESSION['username']))) {
       #pop an alert if user do not login
         alert("please login");
         die;
     } elseif ($_POST) {
         #GET THE FORM DATA
  $name = $_SESSION['username'];#user name from session
  $pid=$_GET['targetKol'];
         $message = str_replace("'", "&apos", trim($_POST["userComment"]));#replace single quotes
         $time=time();

         #Connet to database
         $servername='localhost';
         $username = 'root';
         $password = 'Kappa819';
         $db ='project';
         $mysql = new mysqli($servername, $username, $password, $db);
         if ($mysql->connect_error) {
             die("connection failed:" . $mysql->connect_error);
         }
         $insert = "INSERT INTO comment(pid,uname,comment_text,timeofcomment) VALUES($pid,$_SESSION['username'], $message,$time)";

         #WRITE DOWN COMMENTS#
         if ($mysql->query($insert)) {
             alert("comment succeeded!");
         } else {
             alert("comment failed!");
         }
         $mysql->close();
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
function displayComment(mysqli $mysql, int $pid)
{
    $resultWithHtml="";
    $query="SELECT PID,UID,COMMENT_TEXT,TIMEOFCOMMENT FROM COMMENT WHERE PID=$pid LIMITI 5 ORDER BY TIMEOFCOMMENT DESC";
    $stmt=$mysql->prepare($query);
    $stmt->bind_result($pid, $uid, $comment_text, $timeofcomment);
    $stmt->execute();
    $stmt->store_result();
    $query="SELECT PID,UNAME,COMMENT_TEXT,TIMEOFCOMMENT FROM COMMENT WHERE PID=$pid LIMITI 5 ORDER BY TIMEOFCOMMENT DESC";
    $stmt=$mysql->prepare($query);
    $stmt->bind_result($pid, $uname, $comment_text, $timeofcomment);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows==0) {
        $resultWithHtml="There is no comment here. Be the first one!";
    } else {
        while ($stmt->fetch()) {
          $timetoprint=new date('H:i M d, Y',$timeofcomment);
          $resultWithHtml=$resultWithHtml."
          <div class='container'>
          <div class='col-md-4 col-lg-4'><h4>$uname</h4></div>
          <div class='col-md-8 col-lg-8'><p>$comment_text</p><hr><p>$timetoprint</p></div>
          </div>";
        }
        return $resultWithHtml;
    }
}

 function alert($msg)
 {
     echo "<script type='text/javascript'>alert('$msg');</script>";
 }
?>
