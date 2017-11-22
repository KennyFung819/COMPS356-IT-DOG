<!doctype html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="search kols who you want to know">
      <meta name="author" content="">

      <title>KOLpedia - searching result Here</title>

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
  <<?php session_start() ?>
<form action="searching.php">
<select name="keywordsType">
<option value="name" <?php if($_GET['keywordsType']=="name")echo "selected"; ?>>name</option>
<option value="description">description</option>
<option value=""> </option>
</select>
<input type="text" name="keywordsInput" placeholder="please enter the keywords you want to search" value="<?php
if(isset($_SESSION['keywords']))echo $_SESSION['keywords'];
?>
">
<input type="submit" value="search">
</form>
<div id="result">
<?php
if(isset($_SESSION['resultSet'])) echo $_SESSION['resultSet'];
?>
</div>
<div name="pages">
  <?php
  //display hyperlinks for every page
  if(isset($_SESSION['resultBuffer'])){
    $keywordsInput=$_SESSION['keywordsInput'];
    $keywordsType=$_SESSION['keywordsType'];
    $pages=$_SESSION['resultBuffer']->num_rows/20+1;
    echo "<ul>";
    for($count=1;$count<=$pages;$count++){
      if($count==$_SESSION['page'])
      echo $count;
      else
      echo "<li><a href='searchingResult.php?keywordstype=$keywordsType&keywordsInput=$keywordsInput&page=$count'>$count</a></li>";
    }
    echo "</ul>";
  }
   ?>
</div>

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
