<!DOCTYPE html>
<html lang="en">

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
<!-- navbar for all webpage-->
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
                    <form class="form-inline my-lg-0" role="search">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button type="button" class="btn  btn-primary dropdown-toggle" data-toggle="dropdown">
                                    <span class="fa fa-table"></span>
                                    <span class="label-icon">Filter</span>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="dropdown-item">
                                        <a class="nav-link" href="#">
                                            <span class="fa fa-user"></span>
                                            <span class="label-icon">User</span>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li class="dropdown-item">
                                        <a class="nav-link" href="#">
                                            <span class="fa fa-book"></span>
                                            <span class="label-icon">Organization</span>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                </ul>
                            </div>
                            <input type="search" class="form-control mr-sm-2" aria-label="Search">
                            <div class="input-group-btn">
                                <button type="button" class="btn  btn-outline-success my-2 my-sm-0" type="submit">
                                    <span class="fa fa-search"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
    include 'search.php';
    include 'showContext.php';
    $target= new kol;
    $target->findTarget();
    $targetData = new kolData;
    $targetData->findTarget();
?>
<section class="bg-dark text-white" id="introduction">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-emphasize"><?php $target->getName()?></h2>
                <hr class="my-5">
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 text-lg-left text-md-center">
                <div class="biology-box">
                    <p class="text-muted mb-lg-4 mb-md-2">Gender: <span class="text-primary"><?php $target->getGender(); ?></span></p>
                    <p class="text-muted mb-lg-4 mb-md-2">Platform: <span class="text-primary"><?php $target->getPlatform(); ?></span></p>
                    <p class="text-muted mb-lg-4 mb-md-2">Category: <span class="text-primary"><?php $target->getCategory(); ?></span></p>
                    <p class="text-muted mb-lg-4 mb-md-2">Follower Count:<span class="text-primary"><?php $target->getFollower();?></span></p>
                    <p class="text-muted mb-lg-4 mb-md-2">Basic Intro: <span class="text-primary"><?php $target->getIntro();?></span></p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 text-center">
                    <img class="img-fluid" src=<?php $target->getImg_url();?>>
            </div>
        </div>
    </div>
</section>

<section id="detail-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-lg-left">
                <h2 class="section-heading text-emphasize"><span class="text-primary"><?php $targetData->getType(0); ?></h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-lg-left">
                <div class="biology-box">
                    <p class="text-muted mb-2" id="context1"><span class="text-muted"><?php $targetData->getContext1(0); ?> </p>
                    <p class="text-muted mb-2" id="context2"><span class="text-muted"><?php $targetData->getContext2(0); ?> </p>
                    <p class="text-muted mb-2" id="context3"><span class="text-muted"><?php $targetData->getContext3(0); ?> </p>
                    <p class="text-muted mb-2" id="context4"><span class="text-muted"><?php $targetData->getContext4(0); ?> </p>
                    <p class="text-muted mb-2" id="context5"><span class="text-muted"><?php $targetData->getContext5(0); ?> </p>
                    <p class="text-muted mb-2" id="context5"><span class="text-muted"><?php $targetData->getContext6(0); ?> </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-light text-white" id="detail-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-lg-left">
                <h2 class="section-heading text-emphasize"><span class="text-primary"><?php $targetData->getType(1); ?></h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-lg-left">
                <div class="biology-box">
                    <p class="text-muted mb-2" id="context1"><span class="text-muted"><?php $targetData->getContext1(1); ?> </p>
                    <p class="text-muted mb-2" id="context2"><span class="text-muted"><?php $targetData->getContext2(1); ?> </p>
                    <p class="text-muted mb-2" id="context3"><span class="text-muted"><?php $targetData->getContext3(1); ?> </p>
                    <p class="text-muted mb-2" id="context4"><span class="text-muted"><?php $targetData->getContext4(1); ?> </p>
                    <p class="text-muted mb-2" id="context5"><span class="text-muted"><?php $targetData->getContext5(1); ?> </p>
                    <p class="text-muted mb-2" id="context5"><span class="text-muted"><?php $targetData->getContext6(1); ?> </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="detail-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-lg-left">
                <h2 class="section-heading text-emphasize">Section Sub-title</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 text-lg-left">
                <div class="biology-box">
                    <p class="text-muted mb-0">Paragraph here:</p>

                    <p class="text-muted mb-0">Paragraph here:</p>

                    <p class="text-muted mb-0">Paragraph here:</p>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-light text-white"id="detail-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-lg-left">
                <h2 class="section-heading text-emphasize">Section Sub-title</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 text-lg-left">
                <div class="biology-box">
                    <p class="text-muted mb-0">Paragraph here:</p>

                    <p class="text-muted mb-0">Paragraph here:</p>

                    <p class="text-muted mb-0">Paragraph here:</p>

                </div>
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