<?php require_once("server.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Users</title>
    <style>
        body {
            background: #6a11cb;
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }
        form {
            margin-left: 30%;
            margin-top: 15%;
        }
        label , input{
            font-size: 25px;
            color : white;
            width: 50%;
            height: 30px;
        }
        button {
            font-size: 20px;
            width: 51%;
            height: 35px;
            background-color: gold;
            color:rgb(77, 0, 0) ;
        }
        button:hover{
            background-color:white;
        }
    </style>
</head>
<body>
        <form action="" method="POST">
            <label>Update Name</label><br>
            <input type="text" name="name"><br><br>
            <label>Update Email</label><br>
            <input type="text" name="email"><br><br>
            <button type="submit">Update</button>
        </form>
</body>
</html>

<?php

session_start();

$old_email = $_GET['editemail'];

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $new_email = $_POST['email'];
    $sql = "UPDATE users SET `name`='$name' , `email` = '$new_email' WHERE `email`='$old_email'";
    $connect->query($sql);
    header('location:http://localhost/monday/homePage.php');
}