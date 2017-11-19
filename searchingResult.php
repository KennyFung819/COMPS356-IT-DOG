<!doctype html>
<html>
<head>

</head>
<body>
<form action="newfile.php">
<select name="keywordsType">
<option value="name" selected>name</option>
<option value="description">description</option>
<option value=""> </option>
</select>
<input type="text" name="keywordsInput" placeholder="please enter the keywords you want to search">
<input type="submit" value="search">
</form>
<div id="result">
<?php 
if(isset($_POST['result'])){
    echo "<div></div>";
    echo $_POST['result'];
}
?>
</div>
</body>
</html>