<?php
$con = mysqli_connect("localhost", "root", "", "mydb");


if (isset($_POST['submit'])) {

    $filename =  $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/" . $filename;

    move_uploaded_file($tempname, $folder);

    $name = $_POST['name'];
    $city = $_POST['city'];
    $cmd = "INSERT into students (std_images,name,city) values ('$folder','$name','$city')";
    mysqli_query($con, $cmd);
    header('location:index.php');
    die();
}
?>

<form action="" method="post" enctype="multipart/form-data">

    Image : <input type="file" name="uploadfile"><br><br>
    <!-- <input type="submit" name="submit" value="Upload File" id=""> -->

    Name :<input type="text" name="name"><br><br>
    City :<input type="text" name="city"><br><br>
    <input type="submit" name="submit">
</form>