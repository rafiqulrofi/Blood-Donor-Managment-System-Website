<?php
$link=mysqli_connect("localhost","root","");
$connection=mysqli_select_db($link,"info");

$query=mysqli_query($link,"select * from user");
$rowcount=mysqli_num_rows($query);


?>
<body  style="background-color:  #a96d76;">

<table border="1">

<tr>



                     <td>Id</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Email</td>
                    <td>Mobile</td>
                    <td>Address</td>
                    <td>Gender</td>
                    <td>Age</td>
                    <td>Blood Group</td>
                    <td>Education</td>
                    <td>Image</td>



</tr>
</body>
<?php

for($i=1;$i<=$rowcount;$i++)
{
	$row=mysqli_fetch_array($query);



?>


<tr>

                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['fname'];?></td>
                    <td><?php echo $row['lname'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['mobile'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['age'];?></td>
                    <td><?php echo $row['bgroup'];?></td>
                    <td><?php echo $row['education'];?></td>
                    
					
					<td><img src="image/<?php echo $row["file"] ?>" height="30px" weight="30px" style="border-radius:30px;"</td>


</tr>

<?php
}

?>

</table>