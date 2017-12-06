<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../">KOLpedia</a>
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
                        <a href="../login/login.php"><button class="btn btn-light text-info" name="">LOGIN</button></a>
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
</body>

</html>
