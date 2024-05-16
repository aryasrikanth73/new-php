

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
            <input type="text" name="fname" placeholder="name"><br><br>
            <input type="email" name="femail" placeholder="email"><br><br>
            <input type="text" name="fmobile" placeholder="mobile"><br><br>
            <input type="text" name="fpassword" placeholder="password"><br><br>
            <button name="submit">Submit</button>
            <button><a href="login.php">Login</a></button>
            <button><a href="list.php">Users</a></button>
        </form>
        <?php
    include('connection.php');
    if(isset($_POST['submit'])){        
        $name = $_POST['fname'];
        $email = $_POST['femail'];
        $mobile = $_POST['fmobile'];
        $password = $_POST['fpassword'];


        $sql = "SELECT * FROM `customer` WHERE mobile='$mobile' OR email='$email'";
        $result = mysqli_query($con, $sql);
        if($result){
            $row = mysqli_num_rows($result);
            if($row>0){
                echo "<center><h1 style='color: red;'>This Mobile number or Email already exist</h1></center>";
            }else{
                $sql = "INSERT INTO `customer` (name, email, mobile, password) VALUES ('$name', '$email', $mobile, '$password')";
        $result = mysqli_query($con, $sql);
        if(!$result){
            die(mysqli_connect_error());
        }else{
            echo "<center><h1 style='color: green;'>Data sent successfully</h1></center>";
        }
            }
        }
    }
?>
    </center>
</body>
</html>