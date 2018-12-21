<html>
 <body style="background-color:   #039b88;">
<form action="" method="post">

<label> NAME:<br> <input type="text" name="name"> </br> </label>

<label> MESSAGE:<br> <textarea cols="45" rows="5" name="mes"> </textarea></br> </label>

<input type="submit" name="post" value="post">

</form>
</body>
</html>



<?php

if(isset($_POST['post'])){

$name=$_POST["name"];
$text=$_POST["mes"];
$post=$_POST["post"];

if($post){
	#write down comment#
	
	$write= fopen("com.txt","a+");
	fwrite($write, "<u><b> $name </b></u><br>$text<br>");
	fclose($write);
	
	#DISPLAY COMMENT#
	
	$read= fopen("com.txt","r+t");
	echo "All comments:<br><br>";
	
	while(!feof($read)){
		echo fread($read,1024);
	}
	
	fclose($read);
		
}

else{
	
	#DISPLAY COMMENT#
	
	$read= fopen("com.txt","r+t");
	echo "All comments:<br><br>";
	
	while(!feof($read)){
		echo fread($read,1024);
	}
	
	fclose($read);
		

	
}

}



?>