<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>login</title>
</head>
<body style="background-color: #1f82b0;">
<form method="POST" action="login.php">
	Enter Username : <input type="text" name="fname"><br><br>
	Enter Password : <input type="password" name="pass"><br><br>
	<input type="submit" value="Login">

</form>

</body>
</html>
<?php
session_destroy();
?>