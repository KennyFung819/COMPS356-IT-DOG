<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="search kols who you want to know">
      <meta name="author" content="">

      <title>KOLpedia - search kol Here</title>

      <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!-- Custom fonts for this template -->
      <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

      <!-- Plugin CSS -->
      <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="css/creative.css" rel="stylesheet">
</head>
<body>
  <?php session_start() ?>
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
            <select class="btn btn-primary" name="keywordsType">
            <option class="btn" value="name" selected>Name</option>
            <option class="btn" value="platform">Platform</option>
            </select>
          </div>
            <input type="text" class="form-control" name="keywordsInput" value="">
            <div class="input-group-btn">
            <input type="submit" class="btn  btn-outline-success my-2 my-sm-0" value="search">
            </div>
          </div>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <section class="bg-dark text-white" id="introduction">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <h2 class="section-heading text-emphasize">Search the KOL</h2>
                  <hr class="my-5">
                  <div class="col-lg-8 mx-auto">
                  <p class="text-faded mb-5">"KOL" stand for Key opinion leader, usually describe people who have certain amount of social interference to other people.</p>
                  </div>
              </div>
          </div>
      </div>
      <div class="container">
        <form class="navbar-form navbar-search my-lg-0" action="searching.php">
        <div class="input-group">
        <div class="input-group-btn">
        <select class="btn btn-primary" name="keywordsType">
        <option class="btn" value="name" <?php if (isset($_SESSION['keywordsType'])&&$_SESSION['keywordsType']=="name") {
                echo "selected";
            } ?>>Name</option>
        <option class="btn" value="platform" <?php if (isset($_SESSION['keywordsType'])&&$_SESSION['keywordsType']=="platform") {
                echo "selected";
            } ?>>Platform</option>
        </select>
      </div>
        <input type="text" class="form-control" name="keywordsInput" placeholder="please enter the keywords you want to search" value="
        <?php
        if (!empty($_SESSION['keywordsInput'])&&!ctype_space($_SESSION['keywordsInput'])) {
            echo trim($_SESSION['keywordsInput']);
        }
        ?>
        ">
        <div class="input-group-btn">
        <input type="submit" class="btn  btn-primary" value="search">
        </div>
      </div>
        </form>
  </div>
  </section>
  <section id="resultdetail">
<div class='container'>
<div id="result">
<?php
if (isset($_SESSION['resultSet'])) {
                echo $_SESSION['resultSet'];
            }
?>
</div>
</div>
</section>
<section id=page>
  <div class="container">
<div class="row">
  <?php
if(isset($_SESSION['pages'])) {
  echo $_SESSION['pages'];
}
   ?>
</div>
</div>
</section>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/creative.js"></script>

</body>
</html>
