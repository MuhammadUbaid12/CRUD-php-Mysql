<?php
$con = mysqli_connect("localhost", "root", "", "mydb");


$id = $_GET['id'];
// echo $id;
if (isset($_POST['submit'])) {


    $name = $_POST['name'];
    $city = $_POST['city'];
    $cmd = "UPDATE students set name = '$name', city = '$city' where id = '$id'";
    mysqli_query($con, $cmd);
    header('location:index.php');
    die();
}

$cmd = "SELECT * from students where id = '$id'";
$res = mysqli_query($con,$cmd);
$row = mysqli_fetch_assoc($res);
$name = $row['name'];
$city = $row['city'];
?>

<form action="" method="post">

    Name :<input type="text" name="name" value="<?php echo $name ?>"><br><br>
    City :<input type="text" name="city" value="<?php echo $city ?>"><br><br>
    <input type="submit" name="submit">
</form>