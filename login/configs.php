<?php
//running with the default settings
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
<<<<<<< HEAD:login/configs.php
define('DB_PASSWORD','Kappa819');
=======
define('DB_PASSWORD','');
>>>>>>> master:login/configs.php
define('DB_NAME','project');
//connect to the database
$connection=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
//handle exceptions
if($connection===false){
	exit("Error: ".mysqli_connect_error());
}

?>