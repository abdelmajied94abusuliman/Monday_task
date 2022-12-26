<?php require_once("server.php") ?>

<?php

session_start();
$email = $_SESSION['email'];
$name = $_SESSION['name'];
$role = $_SESSION['role'];
$password = $_SESSION['password'];
$create_at = $_SESSION['create_at'];
$last_login = $_SESSION['last_login'];

$current_date = date("Y-m-d H:i:s",time());
$lastLOG = "UPDATE users SET last_login = '$current_date' WHERE `email`='$email'";
$connect->query($lastLOG);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            background: #6a11cb;
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }
        h1 {
            line-height: 3;
            font-size: 50px;
            color: rgb(250, 173, 0);
            text-align: center;
        }
        div {
            font-size: 50px;
            font-weight: bold;
            color: rgb(250, 173, 0);
            text-align: center;
        }
        #table_data {
            color : white;
            border: 2px solid white;
            margin: auto;
            width: 100%;
        }
        #logout {
            margin-left: 45%;
            width: 150px;
            height: 40px;
            font-size: 25px;
            background-color: rgb(155 , 150, 150);
            border: none;
            
        }
        #logout:hover{
            background-color: white;
            color : black !important;
        }
        #logoutA {
            text-decoration: none; 
            color:white;
        }
        #logoutA:hover {
            color: black;
        }
        .anchor {
            text-decoration: none;
            color : white;
        }
        #edit, #delete {
            width: 60px;
            height: 30px;
        }
        #edit {
            background-color: green;
        }
        #delete {
            background-color: red;
        }
        #edit:hover {
            background-color: yellow;
        }
        #delete:hover {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <h1> <?php echo "$email"; ?> </h1>
    <div> <?php echo "Welcome $name"; ?></div>
    <br>
    <br>
    <br>
    <br>

<?php 

if($role === 1 ) {
    $numbering = 1;
    $sql = "SELECT * FROM users";
    $stmt = $connect->query($sql);
    echo "<table id='table_data'>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Password</td>
                <td>date created</td>
                <td>date last login</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>";
    foreach ($stmt as $data){
        if ($data['is_deleted'] == 0){
        echo "<tr>
                <td>$numbering</td>
                <td>".$data['name']."</td>
                <td>".$data['email']."</td>
                <td>".$data['password']."</td>
                <td>".$data['created_at']."</td>
                <td>".$data['last_login']."</td>
                <td>
                    <form action=''>
                        <button id='edit' type='submit'><a class='anchor' href='edit.php?editemail=".$data['email']."'>Edit</a></button>
                    </form>
                </td>
                <td>
                    <form action=''>
                        <button id='delete' type='submit'><a class='anchor' href='delete.php?deleteemail=".$data['email']."'>Delete</a></button>
                    </form>
                </td>
              </tr>";
            $numbering++;
        }
    }
    echo '</table>';
}
?>

    <br>
    <br>
    <br>
    <br>

    <button id="logout"><a id="logoutA" href="./landingPage.php">Logout</a></button>
</body>
</html>