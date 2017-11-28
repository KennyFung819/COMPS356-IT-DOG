<!DOCTYPE HTML>
 <html> 
 
 <form action="" method="post"> 
 <label> Name: <br><input type="text" name="name"><br></label>
 <label> Comments: <br><textarea colls="40" rows="5" name="mes"></textarea><br></label> 
 <input type="submit" name="post" value="Post"> 
 </form> 
 </html> 
 
 <?php 
 
 $name = $_POST["name"]; 
 $mes = $_POST["mes"]; 
 $post = $_POST["post"]; 
 
 if($post){      
	
 #WRITE DOWN COMMENTS#
 
 $write = fopen("com.txt", "a+");     
 fwrite($write, "<b><u>$name</u></b><br>$text<br>");     
 fclose($write);    
 
 #DISPLAY COMMENTS#
 
 $read = fopen("com.txt", "r+t");     
 echo "All comments:";     
 while(!feof($read)){         
	echo fread($read, 1024);     
	}     
	fclose($read); 
	} 
else {
	
#DISPLAY COMMENTS# 
    
$read = fopen("com.txt", "r+t");
echo "All comments:<br>";     
while(!feof($read)){        
	echo fread($read, 1024);     
	}     
	fclose($read); 
	} 
	
?>