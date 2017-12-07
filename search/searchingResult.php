<!DOCTYPE html>
<html lang="en">
<?php require_once "../common/head.html"?>
<body class="bg-light">
<?php require_once "../common/navbar.php" ?>
<section class="text-white" id="introduction">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-emphasize">Search the KOL</h2>
                <hr class="my-5">
                <div class="col-lg-8 mx-auto">
                    <p class="text-dark mb-5">"KOL" stand for Key opinion leader, usually describe people who have certain amount of social interference to other people.</p>
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
                        <option class="btn" value="category" <?php if (isset($_SESSION['keywordsType'])&&$_SESSION['keywordsType']=="category") {
                            echo "selected";
                        } ?>>category</option>
                    </select>
                </div>
                <input type="text" class="form-control" name="keywordsInput" placeholder="please enter the keywords you want to search" value="<?php
                if (!empty($_SESSION['keywordsInput'])&&!ctype_space($_SESSION['keywordsInput'])) {
                    echo trim($_SESSION['keywordsInput']);
                }
                ?>">
                <div class="input-group-btn">
                    <input type="submit" class="btn  btn-primary" value="search">
                </div>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="row">
            <?php if(isset($_SESSION['pages'])){
                $sort1="searching.php?keywordsInput=".$_SESSION['keywordsInput']."&keywordsType=".$_SESSION['keywordsType']."&page=1&sort=1";
                $sort2="searching.php?keywordsInput=".$_SESSION['keywordsInput']."&keywordsType=".$_SESSION['keywordsType']."&page=1&sort=2";
                ?>
                <div class="btn-group">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort by
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a href='<?php echo $sort1?>'>By name</a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo $sort2?>">By followers</a>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</section>
<section id="resultdetail">
    <div class='container'>
        <div id="result">
            <?php if(isset($_SESSION['resultSet'])) echo $_SESSION['resultSet']; ?>
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

<section id="create">
    <div class="text-center text-info">
        <p>There some KOL we are missing? How about you help us create one!</p>
        <a class="btn btn-primary" href="../submission/index.php">Create</a>
    </div>
</section>

<?php require_once "../common/javascript.html"?>

</body>
</html>
