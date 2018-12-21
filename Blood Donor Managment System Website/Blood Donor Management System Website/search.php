 <?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `user` WHERE CONCAT(`bgroup`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `user`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "info");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

 <!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body style="background-color:#7c4a3f;">
        
        <form action="search.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Search Blood"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Blood Group</th>
                    <th>Education</th>
                    <th>Image</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
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
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>

