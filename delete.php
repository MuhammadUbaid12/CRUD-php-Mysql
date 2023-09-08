<?php

$id = $_GET['id'];
echo $id;
$con = mysqli_connect("localhost", "root", "", "mydb");

$cmd = "DELETE from students where id = '$id'";
mysqli_query($con,$cmd);
header('location:index.php');
die();
?>