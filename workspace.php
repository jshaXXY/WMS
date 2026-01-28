<?php
session_start();
include "connect.php";
global $conn;

$username = $_SESSION['username'];
$log_path = $_SESSION['log_path'];

# request for authorization level
$sql_authorization_level = "select users.`authorization level` from users where username='$username'";
$result = $conn -> query($sql_authorization_level);
$rows = $result -> fetch_assoc();
$authorization_level = $rows['authorization level'][0];
$_SESSION['authorization_level'] = $authorization_level;

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>workspace</title>
    </head>
    <style>
        .unclickable    {
            pointer-events: none;
        }
    </style>
    <body>
        <p>
            <a href="index.html">Log out</a><br>
            <a href="change_password.php">Change Password</a><br>
            Welcome, <?php echo $username; ?>!<br>
            Authorization Level: <?php echo $authorization_level; ?>
        </p>
        <p>
            <a href="user_management/user_management.php" <?php if ($authorization_level != 5) echo "class='unclickable'"?>>User Management</a>
        </p>
    </body>
</html>
