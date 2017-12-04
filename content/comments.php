<!DOCTYPE HTML>
 <html>
 <div class="container">
     <form  method="post">
         <div class="form-group">
             <div class="form-group row">
                 <label for="name" class="col-lg-2  col-form-label"> Name:</label><input type="text" readonly class="form-control-plaintext" id="name">
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



 if (isset($_POST['userComment'])) {
     #POP A ALERT IF USER DO NOT INPUT ANY THING
     alert("The comment cannot be empty");
     die;
 }

 #Connet to database

 $servername='localhost';
 $username = 'root';
 $password = 'Kappa819';
 $db ='project';

 $name = $_POST["userName"];
 $message = $_POST["userComment"];

 $mysql = new mysqli($servername, $username, $password, $db);
 if ($mysql->connect_error){
     die("connection failed:" . $mysql->connect_error);
 }

 $pid=$_GET['targetKol'];

 if($_POST){



 $insert = "INSERT INTO comment(pid,uid,comment_text) VALUES($pid,uid, $message) FROM comment WHERE pid='$pid' ORDER BY id";

 #GET THE FORM DATA



 }
 #WRITE DOWN COMMENTS#

#DISPLAY COMMENTS#


 function alert($msg) {
     echo "<script type='text/javascript'>alert('$msg');</script>";
 }
?>