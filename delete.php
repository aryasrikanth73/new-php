<?php
include('connection.php');
$id=$_GET['deleteid'];
if(isset($_GET['deleteid'])){
    $sql="DELETE FROM `customer` WHERE id=$id";
    $result=mysqli_query($con, $sql);
    if(!$result){
        die(mysqli_connect_error());
    }else{
        // echo "<h1>suceessfully deleted $id</h1>";
        header('location:list.php');
    }
}
?>