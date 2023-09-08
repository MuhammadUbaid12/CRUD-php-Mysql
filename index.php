<?php
$con = mysqli_connect("localhost", "root", "", "mydb");
// $cmd = "SELECT * from students where name like '_a%'";


if (isset($_POST['submit'])) {
    $search = $_POST['search'];
    $cmd = "SELECT * from students where name like '$search%' or city like '$search%'";
    $res =  mysqli_query($con, $cmd);    

} else {
    $cmd = "SELECT * from students";
    $res =  mysqli_query($con, $cmd);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #E4E5E6;
        }

        table,
        tr,
        td {
            padding: 8px;
        }

        tr,
        td {
            border: 2px solid black;
            width: 200px;
            text-align: center;
            box-shadow: 2px 3px 5px rgba(0, 0, 0, 0.3);
            opacity: 0.9;
        }

        table {
            border-collapse: collapse;
            display: flex;
            align-items: center;
            justify-content: center;
            /* height: 100vh; */
            background: #314755;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #26a0da, #314755);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #26a0da, #314755);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


        }

        .crud th {
            font-size: 30px;
            background-color: #E4E5E6;
            color: black;
        }

        /* th{
            font-size: 30px;
            position: relative;
            left: 200px;
            padding: 10px;
        } */
        form {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 600px;
            padding: 10px;
        }

        input[type="submit"] {
            padding: 10px;
            color: black;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="search">
        <input type="submit" name="submit">
    </form>
    <table border="0">
        <tr>
            <td colspan="5"><a href="add.php">Add New</a></td>
        </tr>

        <tr class="crud">
            <th colspan="5">CRUD</th>
        </tr>

        <tr>
            <td>id</td>
            <td>Image</td>
            <td>name</td>
            <td>city</td>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo "<img src='" . $row['std_images'] . "' width='100' height='100'>"; ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['city'] ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>&nbsp;
                    <a href="delete.php?id=<?php echo $row['id'] ?> ">Delete</a>
                </td>
            </tr>

        <?php } ?>
    </table>
</body>

</html>