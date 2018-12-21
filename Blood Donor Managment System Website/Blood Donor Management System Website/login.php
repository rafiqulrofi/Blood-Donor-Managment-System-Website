<?php
$fname=$_POST['fname'];//username
$pass=$_POST['pass'];//password 
session_start();

$con=mysqli_connect("localhost","root","","info");//mysqli("localhost","username of database","password of database","database name")
$result=mysqli_query($con,"SELECT * FROM `user` WHERE `fname`='$fname' && `pass`='$pass'");
$count=mysqli_num_rows($result);
if($count==1)
{
	echo "Login success";
	$_SESSION['log']=1;
	header("refresh:2;url=welcome.php");

}
else
{
	echo "please fill proper details";
	header("refresh:2;url=index.php");// it takes 2 sec to go index page
}


?>