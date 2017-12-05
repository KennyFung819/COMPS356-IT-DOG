<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KOLpedia - Find The World Best KOL Here</title>

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
        <a class="navbar-brand js-scroll-trigger" href="../main/index.php">KOLpedia</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <?php include "../content/random_page.php";
                    $random= new randomPage;
                    ?>
                    <a class="nav-link" href="../content/?targetKol=<?php $random->getRandom(); ?>">Random Page</a>
                </li>
                <li class="nav-item">
                    <form class="navbar-form navbar-search my-lg-0" action="../search/searching.php">
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
                        <a href="../login/logout.php"><button class="btn btn-light text-info" name="">LOGIN</button></a>
                        <!--if user logged in , show user info and a dropdown meum for logout-->
                        <?php
                    } else {  ?>

                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION['username']; ?>
                                <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                                <a class="text-muted" href="../login/logout.php">Log Out</a>
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
