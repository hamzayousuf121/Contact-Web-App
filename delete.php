<?php 
session_start();
require 'db.php';
if($_SESSION['isloggedin']){
$id = $_GET['id'];
$result = mysqli_query($con, "DELETE FROM user_data WHERE id=$id");
header("Location:index.php");
}
else{
    header("Location:login.php");
}
?>