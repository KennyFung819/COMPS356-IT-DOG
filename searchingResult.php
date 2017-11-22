<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <script type="text/javascript" src="js\jquery-3.2.1.slim.min.js"></script>
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
    for($count=1;$count<=$pages;$count++){
      if($count==$_SESSION['page'])
      echo $count;
      else
      echo "<a href='searchingResult.php?keywordstype=$keywordsType&keywordsInput=$keywordsInput&page=$count'>$count</a>";
    }
  }
   ?>
</div>
</body>
</html>
