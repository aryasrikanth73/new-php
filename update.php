<?php
    include('connection.php');
    $id=$_GET['updateid'];
    $sql="SELECT * FROM `customer` WHERE id=$id";
        $result=mysqli_query($con, $sql);
        $row=mysqli_fetch_assoc($result);
        $cname = $row['name'];
        $cemail = $row['email'];
        $cmobile = $row['mobile'];
        $cpassword = $row['password'];
    if(isset($_POST['submit'])){  
        $name = $_POST['fname'];
        $email = $_POST['femail'];
        $mobile = $_POST['fmobile'];
        $password = $_POST['fpassword'];

        
        $sql="SELECT * FROM `customer` WHERE (mobile='$mobile' OR email='$email') AND id != $id";
        $result = mysqli_query($con, $sql);
        if($result){
            $row= mysqli_num_rows($result);
            if($row>0){
                echo "<center><h3 style='color:red;'>Another User have same Email or Mobile so U can't save</h3></center>";
            }else{
                $sql = "UPDATE `customer` SET name='$name', email='$email', mobile=$mobile, password='$password' WHERE id=$id";
                $result = mysqli_query($con, $sql);
                if($result){
                header('location:list.php');
                    }else{
                        die(mysqli_connect_error());
                    }
            }
        }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create | REGISTER</title>
</head>
<body>
    <center>
        <h1>Register Here</h1>
        <form method="post">
            <input type="text" name="fname" placeholder="name" value="<?php echo $cname ?>"><br><br>
            <input type="email" name="femail" placeholder="email" value="<?php echo $cemail ?>"><br><br>
            <input type="text" name="fmobile" placeholder="mobile" value="<?php echo $cmobile ?>"><br><br>
            <input type="text" name="fpassword" placeholder="password" value="<?php echo $cpassword ?>"><br><br>
            <button name="submit">Submit</button> <br><br><a href="login.php">login</a>
        </form>
    </center>
</body>
</html>