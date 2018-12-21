<?php
$link=mysqli_connect("localhost","root","");
$connection=mysqli_select_db($link,"info");

$query=mysqli_query($link,"select * from user");
$rowcount=mysqli_num_rows($query);


?>


<table border="1">

<tr>

<td>ID</td>
<td>USER</td>
<td>PASSWORD</td>
<td>ADDRESS</td>
<td>GENDER</td>
<td>BGROUP</td>
<td>EDUCATION</td>
<td>FILE</td>

</tr>

<?php

for($i=1;$i<=$rowcount;$i++)
{
	$row=mysqli_fetch_array($query);



?>


<tr>

<td><?php echo $row["id"] ?></td>
<td><?php echo $row["user"] ?></td>
<td><?php echo $row["pass"] ?></td>
<td><?php echo $row["address"] ?></td>
<td><?php echo $row["gender"] ?></td>
<td><?php echo $row["bgroup"] ?></td>
<td><?php echo $row["education"] ?></td>
<td><img src="image/<?php echo $row["file"] ?>" height="30px" weight="30px" style="border-radius:30px;"</td>


</tr>

<?php
}

?>

</table>