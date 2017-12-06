

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KOLpedia - Find The World Best KOL Here</title>

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

  <body id="page-top">

    <!-- Navigation -->
    <?php session_start(); ?>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="main/index.php">KOLpedia</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <?php include "content/random_page.php";
                        $random= new randomPage;
                        ?>
                        <a class="nav-link" href="content/?targetKol=<?php $random->getRandom(); ?>">Random Page</a>
                    </li>
                    <li class="nav-item">
                        <form class="navbar-form navbar-search my-lg-0" action="search/searching.php">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <select class="btn btn-primary" name="keywordsType">
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
                        <!--if user not yet login, show login button-->
                        <?php if(!isset($_SESSION['username']) || empty($_SESSION['username'])){ ?>
                            <a href="login/login.php"><button class="btn btn-light text-info" name="">LOGIN</button></a>
                            <!--if user logged in , show user info and a dropdown meum for logout-->
                            <?php
                        } else {  ?>

                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $_SESSION['username']; ?>
                                    <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                                    <a class="text-muted" href="login/logout.php">Log Out</a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- header-->
    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase text-info">
              <strong>We got some of the world most Famous <span class="text-emphasize">KOL</span> here.</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-info  mb-5">"KOL" stand for Key opinion leader, usually describe people who have certain amount of social interference to other people.</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
          </div>
        </div>
      </div>
    </header>
    <!-- Intro-->
    <section id="kolDefinition">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">What is Key Opinion Leader?</h2>
                    <hr class="my-4">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box mt-5 mx-auto">
                        <i class="fa fa-4x fa-check text-primary mb-3 sr-icons"></i>
                        <h3 class="mb-3">KOL is be trusted</h3>
                        <p class="text-muted mb-0">Some people on the planet believe in him/her.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box mt-5 mx-auto">
                        <i class="fa fa-4x fa-star text-primary mb-3 sr-icons"></i>
                        <h3 class="mb-3">Star on their internet</h3>
                        <p class="text-muted mb-0">They are usually good at where they are doing!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box mt-5 mx-auto">
                        <i class="fa fa-4x fa-users text-primary mb-3 sr-icons"></i>
                        <h3 class="mb-3">Well known</h3>
                        <p class="text-muted mb-0">When you say their name, other know.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box mt-5 mx-auto">
                        <i class="fa fa-4x  fa-lightbulb-o text-primary mb-3 sr-icons"></i>
                        <h3 class="mb-3">Inspiration</h3>
                        <p class="text-muted mb-0">They inspire other people!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about us-->
    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">We collected some of internet best talent and display them here!</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4">They are the most well-known person on the internet! You can find the you need infomation around here.</p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Show me one!</a>
          </div>
        </div>
      </div>
    </section>

    <!-- contact us-->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">Contact us if u have something want to say</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>123-456-6789</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:your-email@your-domain.com">feedback@myemail.com</a>
            </p>
          </div>
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
