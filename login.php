

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create | REGISTER</title>
</head>
<body>
    <center>
        <h1>Login Here</h1>
        <form method="post">
            <input type="text" name="femailormobile" placeholder="name or password"><br><br>
            <input type="text" name="fpassword" placeholder="password"><br><br>
            <button name="submit">Login</button>
            <button><a href="list.php">Users</a></button>
        </form>
        <?php
    include('connection.php');
    if(isset($_POST['submit'])){       
        $emailormobile = $_POST['femailormobile'];
        $password = $_POST['fpassword'];


        $sql = "SELECT * FROM `customer` WHERE (mobile='$emailormobile' OR email='$emailormobile') AND password='$password'";
        $result = mysqli_query($con, $sql);
        if($result){
            $num=mysqli_num_rows($result);
            if($num>0){
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['name']=$row['name'];
            header('location:welcome.php'); 
        }else{
            echo "Data not valid";
        }
        }else{
            die(mysqli_connect_error());
        }
    }
?>
    </center>
</body>
</html>