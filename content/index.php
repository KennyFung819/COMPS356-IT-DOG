<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="twitter:card" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">
    <meta name="twitter:url" content="">
    <meta name="twitter:widgets:csp" content="on">

    <meta property="og:title" content="">
    <meta property="og:site_name" content="">
    <meta property="og:type" content="">
    <meta property="og:image" content="">
    <meta property="og:url" content="">
</head>
<?php require_once "../common/head.html"?>

<body>
<!-- navbar for all webpage-->
<?php require_once '../common/navbar.php' ?>

<?php
    require_once 'getKol.php';
    require_once 'showContext.php';
    require_once 'getContact.php';
    $target= new kol;
    $target->findTarget();
    $targetContent = new content();
    $targetContent->findTarget();
    $max = $targetContent->getMax();
    $targetContact = new contact();
    $targetContact->findTarget();

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
                    <p class="text-muted mb-lg-4 mb-md-2">Social Media Follower Count:<span
                                class="text-primary"><?php $target->getFollower(); ?></span></p>
                    <p class="text-muted mb-lg-4 mb-md-2">Basic Intro: <span
                                class="text-primary"><?php $target->getIntro(); ?></span></p>
                    <p class="text-muted mb-lg-4 mb-md-2">Subscribe Count  : ~ <span
                                class="text-primary"><?php $target->getSub(); ?></span></p>
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

<section class="bg-dark text-white" id="video">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading">Here one of <?php $target->getName() ?> most watched video!</h2>
        </div>
        <hr>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="//www.youtube.com/embed/gRyPjRrjS34" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
        </div>
    </div>
</section>


<section class="bg-light text-dark" id="News">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading">Here the latest news about <?php $target->getName() ?> !</h2>
        </div>
        <hr>
        <div class="text-center">
            <a class="twitter-timeline"
               data-height="500"
               data-width="500"
               data-chrome="nofooter"
               data-link-color="#820bbb"
               data-border-color="#a80000"
               href="https://twitter.com/pewdiepie">Tweets by @<?php $target->getName() ?></a>
        </div>
    </div>
</section>


<?php
require_once "comments.php";
?>



<section class="bg-white text-primary text-center" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-lg-center">
                <h2 class="section-heading text-emphasize">Want to know more about this KOL? Or even contact him/her?</h2>
                <p class="text-muted">You should check out their social media accounts and email adress.</p>
                <hr>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php if($targetContact->getYoutube() != NULL){ ?>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <a href="<?php echo $targetContact->getYoutube() ?>"><i class="fa fa-4x fa-youtube text-primary mb-3 sr-icons"></i>
                </div>
            </div>
            <?php }
            if($targetContact->getTwitter()!=null){ ?>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <a href="<?php echo $targetContact->getTwitter() ?>"><i class="fa fa-4x fa-twitter text-primary mb-3 sr-icons"></i>
                </div>
            </div>
            <?php }
            if($targetContact->getTwitch()!=null){ ?>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <a href="<?php echo $targetContact->getTwitch() ?>"><i class="fa fa-4x fa-twitch text-primary mb-3 sr-icons"></i>
                </div>
            </div>
            <?php }
            if($targetContact->getFacebook()!=null){ ?>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <a href="#<?php echo $targetContact->getFacebook() ?>"><i class="fa fa-4x  fa-facebook-official text-primary mb-3 sr-icons"></i>
                </div>
            </div>
            <?php }?>
            <?php if($targetContact->getEmail()!=null){ ?>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <a href="<?php echo $targetContact->getEmail() ?>"><i class="fa fa-4x fa-envelope-o text-primary mb-3 sr-icons"></i>
                </div>
            </div>
            <?php }
            if($targetContact->getIG()!=null){ ?>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <a href="<?php echo $targetContact->getIG() ?>"><i class="fa fa-4x fa-instagram text-primary mb-3 sr-icons"></i>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>


<?php require_once "../common/javascript.html"?>
</body>


</html>
