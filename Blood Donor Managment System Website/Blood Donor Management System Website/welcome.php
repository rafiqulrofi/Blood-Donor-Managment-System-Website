<?php
session_start();
if(isset($_SESSION['log']))
{
?>


<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body  style="background-color: #3aa499 ;";">
<h1>Welcome sir</h1>
<a href="index.php" >logout</a>
</body>
</html>
<?php
}
else
{
	echo "please fill proper details";
	header("refresh:2;url=index.php");
}

?>







 <?php

$host = "localhost";
$user = "root";
$password ="";
$database = "info";

$id = "";
$fname = "";
$lname = "";
$pass = "";
$email = "";
$mobile = "";
$address = "";
$gender = "";
$age    = "";
$bgroup    = "";
$education    = "";
$file    = "";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to mysql database
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}


// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['id'];
    $posts[1] = $_POST['fname'];
    $posts[2] = $_POST['lname'];
    $posts[3] = $_POST['pass'];
    $posts[4] = $_POST['email'];
    $posts[5] = $_POST['mobile'];
    $posts[6] = $_POST['address'];
    $posts[7] = $_POST['gender'];
    $posts[8] = $_POST['age'];
    $posts[9] = $_POST['bgroup'];
    $posts[10] = $_POST['education'];
    $posts[11] = $_POST['file'];
    return $posts;
}

// Search

if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM user WHERE `pass` = $data[3]";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                 $id = $row['id'];
                $fname = $row['fname'];
                $lname = $row['lname'];
                $pass = $row['pass'];
                $email = $row['email'];
                $mobile = $row['mobile'];
                $address = $row['address'];
                $gender = $row['gender'];
                $age = $row['age'];
                $bgroup = $row['bgroup'];
                $education = $row['education'];
                $file = $row['file'];
            }
        }else{
            echo 'No Data For This Id';
        }
    }else{
        echo 'Result Error';
    }
}


// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `user`(`fname`, `lname`,`pass`,`email`,`mobile`,`address`,`gender`,`age`,`bgroup`,`education`,`file`) VALUES ('$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]')";
    try{
        $insert_Result = mysqli_query($connect, $insert_Query);
        
        if($insert_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Inserted';
            }else{
                echo 'Data Not Inserted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert '.$ex->getMessage();
    }
}

// Delete
if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM `user` WHERE `id` = $data[0]";
    try{
        $delete_Result = mysqli_query($connect, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Deleted';
            }else{
                echo 'Data Not Deleted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Delete '.$ex->getMessage();
    }
}

// Edit
if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE `user` SET `fname`='$data[1]',`lname`='$data[2]',`pass`='$data[3]',`email`='$data[4]',`mobile`='$data[5]',`address`='$data[6]',`gender`='$data[7]',`age`='$data[8]',`bgroup`='$data[9]',`education`='$data[10]',`file`='$data[11]' WHERE `pass` = $data[3]";
    try{
        $update_Result = mysqli_query($connect, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Updated';
            }else{
                echo 'Data Not Updated';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Update '.$ex->getMessage();
    }
}



?>


<!DOCTYPE Html>
<html>
    <head>
        <title>PHP INSERT UPDATE DELETE SEARCH</title>
    </head>
    <body>
        <form action="welcome.php" method="post">
		
		   
		
          <!--your id:input type="number" name="id" placeholder="Id" value="<?php echo $id;?>"><br><br -->
           first name: <input type="text" name="fname" placeholder="First Name" value="<?php echo $fname;?>"><br><br>
           last name: <input type="text" name="lname" placeholder="Last Name" value="<?php echo $lname;?>"><br><br>
            password: <input type="text" name="pass" placeholder="password" value="<?php echo $pass;?>"><br><br>
            email:<input type="text" name="email" placeholder="Email" value="<?php echo $email;?>"><br><br>
            mobile:<input type="text" name="mobile" placeholder="Mobile" value="<?php echo $mobile;?>"><br><br>
           address: <input type="text" name="address" placeholder="Address" value="<?php echo $address;?>"><br><br>
           gender: <input type="text" name="gender" placeholder="gender" value="<?php echo $gender;?>"><br><br>
           age: <input type="number" name="age" placeholder="age" value="<?php echo $age;?>"><br><br>
           blood group: <input type="text" name="bgroup" placeholder="Blood Group" value="<?php echo $bgroup;?>"><br><br>
           education: <input type="text" name="education" placeholder="education" value="<?php echo $education;?>"><br><br>
          image: <input type="file" name="file" placeholder="Image" value="<?php echo $file;?>"><br><br>
            <div>
                <!-- Input For Add Values To Database-->
                <input type="submit" name="insert" value="Add">
                
                <!-- Input For Edit Values -->
                <input type="submit" name="update" value="Update">
                
                <!-- Input For Clear Values -->
                <input type="submit" name="delete" value="Delete">
                
                <!-- Input For Find Values With The given ID -->
                <input type="submit" name="search" value="Find">
            </div>
        </form>
    </body>
</html>