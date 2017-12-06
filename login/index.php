<!DOCTYPE html>
<html lang="en">

<?php require_once "../common/head.html"?>
<body>

<?php require_once '../common/navbar.php' ?>

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

<?php require_once "../common/javascript.html"?>
</body>
</html>