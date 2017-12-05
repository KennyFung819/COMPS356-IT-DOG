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

    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
       <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">KOLpedia</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
           <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="navbar-nav ml-auto">
                   <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#about">Category</a>
                </li>
                   <li class="nav-item">
                       <a class="nav-link js-scroll-trigger" href="#services">Random Page</a>
                   </li>
                   <li class="nav-item">
                       <form class="navbar-form navbar-search my-lg-0" action="searching.php">
                           <div class="input-group">
                               <div class="input-group-btn">
                                   <select class="btn btn-primary text-center" name="keywordsType">
                                       <option class="btn" value="name" selected>Name</option>
                                       <option class="btn" value="platform">Platform</option>
                                   </select>
                               </div>
                               <input type="text" class="form-control" name="keywordsInput" value="">
                               <div class="input-group-btn">
                                   <input type="submit" class="btn  btn-success my-2 my-sm-0" value="search">
                               </div>
                           </div>
                       </form>
                   </li>
                   <li class="nav-item">
                       <a href="../login"><button class="btn btn-light text-info">LOGIN</button></a>
                   </li>
               </ul>
           </div>
       </div></nav>

    <section id="logout">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-primary">Hi, <b><?php echo $_SESSION['username']; ?></b>. Welcome to our site!</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class=" text-muted text-center"><a href="logout.php">Sign out of your account</a>.</p>
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