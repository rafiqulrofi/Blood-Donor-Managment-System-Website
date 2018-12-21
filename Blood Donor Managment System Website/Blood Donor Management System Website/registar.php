<?php
$link=mysqli_connect("localhost","root","");
$connection=mysqli_select_db($link,"info");


if(isset($_REQUEST["submit"]))
{
	
	$fname=$_REQUEST["fname"];
	$lname=$_REQUEST["lname"];
	
	$pass=$_REQUEST["pass"];
	$email=$_REQUEST["email"];
	$mob=$_REQUEST["mobile"];
	
    $add=$_REQUEST["address"];
	$gender=$_REQUEST["gender"];
	$age=$_REQUEST["age"];
	
	$group=$_REQUEST["group"];
    $education=$_REQUEST["education"];
	$b=implode(",",$education);
	$file=$_FILES["file"]["name"];
	$tmp_name=$_FILES["file"]["tmp_name"];
	$path="image/".$file;
	move_uploaded_file($tmp_name,$path);
	
	 
mysqli_query($link,"insert into user(fname,lname,pass,email,mobile,address,gender,age,bgroup,education,file)values('$fname','$lname','$pass','$email','$mob','$add','$gender','$age','$group','$b','$file')");

}

?>



<html>
<head>
<title>REGISTRATION FORM</title>
 <link rel="stylesheet" href="css/registration.css" type="text/css" />     <!--css link set up-->
</head>

<body>
  
  <div id="nav">
  Donor Registration form


<form method="post" enctype="multipart/form-data">
  
 USER NAME:<input type="text" placeholder="first Name" name="fname">
          <input type="text" placeholder="Last Name" name="lname"><br>
 
  PASSWORD:<input type="password" placeholder="Enter Password" name="pass"><br>
  
  Email:<input type="text" placeholder="Email" name="email"><br>
  
  Mobile:<input type="text" placeholder="Mobile No" name="mobile"><br><br>
  
   ADDRESS:<textarea name="address" placeholder="Enter address"></textarea><br>
   
   Gender:<input type="radio" name="gender" value="male">Male<input type="radio" name="gender" value="female">Female <br><br>
  
     Age:<input type="text" placeholder="enter age" name="age"><br>
  
  <br><br>
  
  
  BLOOD GROUP:
<select name="group">
<option value="">select any option</option>
<option value="A+">A+</option>
<option value="A-">A-</option>
<option value="B+">B+</option>
<option value="B-">B-</option>
<option value="O+">O+</option>
<option value="O-">O-</option>
<option value="AB+">AB+</option>
<option value="AB-">AB-</option>
</select>
<br><br>

Education:
<input type="checkbox" name="education[]" value="diploma">Diploma
<input type="checkbox" name="education[]" value="b.tech">B.tech
<input type="checkbox" name="education[]" value="mba">MBA
	<br><br>

	File upload:
<input type="file" name="file">	
	<br><br>



<br><br>
  
  <input type="submit" value="insert" name="submit">
  
  
  </form>
  
  
</body>
</html>
  
  
   
  