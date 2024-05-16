<?php include('connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>READ | DELETE | UPDATE</title>
    <style>
         table, th, td{
            border: solid 1px black ;
         }
    </style>
</head>
<body><center>
    <table>
        <tr>
            <th>S.No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Password</th>
            <th>Operations</th>
        </tr>
        <?php 
        $sql="SELECT * FROM `customer`";
        $result=mysqli_query($con, $sql);
        if(!$result){
            die(mysqli_connect_error());
        }else{
            while($row=mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $name = $row['name'];
                $email = $row['email'];
                $mobile = $row['mobile'];
                $password = $row['password'];
        echo '<tbody>
                <tr>
                    <td>'.$id.'</td>
                    <td>'.$name.'</td>
                    <td>'.$email.'</td>
                    <td>'.$mobile.'</td>
                    <td>'.$password.'</td>
                    <td><button><a href="update.php?updateid='.$id.'">Update</a></button><button><a href="delete.php?deleteid='.$id.'">Delete</a></button></td>
                </tr>
            </tbody>'; 
            }
        }
        ?>
    </table>
    <button><a href="signup.php">Signup</a></button>
    <button><a href="login.php">Login</a></button>
</center>
</body>
</html>