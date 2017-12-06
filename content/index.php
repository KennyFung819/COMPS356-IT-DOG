<!DOCTYPE html>
<html lang="en">

<?php require_once "../common/head.html"?>

<body>
<!-- navbar for all webpage-->
<?php require_once '../common/navbar.php' ?>

<?php
    include 'getKol.php';
    include 'showContext.php';
    $target= new kol;
    $target->findTarget();
    $targetContent = new content();
    $targetContent->findTarget();
    $max = $targetContent->getMax();
?>



<section class="bg-dark text-white" id="introduction">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-emphasize"><?php $target->getName() ?></h2>
                <hr class="my-5">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 text-lg-left text-md-center">
                <div class="biology-box">
                    <p class="text-muted mb-lg-4 mb-md-2">Gender: <span
                                class="text-primary"><?php $target->getGender(); ?></span></p>
                    <p class="text-muted mb-lg-4 mb-md-2">Platform: <span
                                class="text-primary"><?php $target->getPlatform(); ?></span></p>
                    <p class="text-muted mb-lg-4 mb-md-2">Category: <span
                                class="text-primary"><?php $target->getCategory(); ?></span></p>
                    <p class="text-muted mb-lg-4 mb-md-2">Follower Count:<span
                                class="text-primary"><?php $target->getFollower(); ?></span></p>
                    <p class="text-muted mb-lg-4 mb-md-2">Basic Intro: <span
                                class="text-primary"><?php $target->getIntro(); ?></span></p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 text-center">
                <img class="img-fluid" src="../<?php $target->getImg_url(); ?>">
            </div>
        </div>
    </div>
</section>


<?php
for ($sector=1; $sector<=$max; $sector++){
    ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-lg-left">
                    <h2 class="section-heading text-emphasize"><span
                                class="text-primary"><?php $targetContent->getSubTitle($sector); ?></h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 text-lg-left">
                    <div class="biology-box">
                        <p class="text-muted mb-2" id="Content"><span
                                    class="text-muted"><?php $targetContent->getContent($sector); ?></p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>


<?php
require_once "comments.php";
?>



<section class="bg-dark text-white text-center" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-lg-center">
                <h2 class="section-heading text-emphasize">Want to know more about this KOL?</h2>
                <p class="text-muted">You should check out their social media accounts.</p>
                <hr>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <a href="#"><i class="fa fa-4x fa-youtube text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Insert thing here</h3></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <a href="#"><i class="fa fa-4x fa-twitter text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Insert thing here</h3></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <a href="#"><i class="fa fa-4x fa-twitch text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Insert thing here</h3></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <a href="#"><i class="fa fa-4x  fa-facebook-official text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Insert thing here</h3></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <a href="#"><i class="fa fa-4x fa-envelope-o text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Insert thing here</h3></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <a href="#"><i class="fa fa-4x fa-instagram text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Insert thing here</h3></a>
                </div>
            </div>
        </div>
    </div>
</section>


<?php require_once "../common/javascript.html"?>
</body>


</html>
