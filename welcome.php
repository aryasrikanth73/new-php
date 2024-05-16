<?php
session_start();
if(!isset($_SESSION['name'])){
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME</title>
</head>
<body>
    <center><h1>HI HELLO <?php echo $_SESSION['name']; ?></h1>
    <button><a href="logout.php">Logout</a></button>
    </center>
</body>
</html>