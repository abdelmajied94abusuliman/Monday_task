<?php require_once("server.php") ?>

<?php

session_start();

$old_email = $_GET['deleteemail'];

$sql = "UPDATE users SET `is_deleted`='1' WHERE `email`='$old_email'";
$connect->query($sql);
header('location:http://localhost/monday/homePage.php');
