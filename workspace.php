<?php
session_start();
include "connect.php";
global $conn;

$username = $_SESSION['username'];
$log_path = $_SESSION['log_path'];

# request for authorization level
$sql_authorization_level = "select users.`authorization_level` from users where username='$username'";
$result = $conn -> query($sql_authorization_level);
$rows = $result -> fetch_assoc();
$authorization_level = $rows['authorization_level'][0];
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
            <a href="user_management/user_management.php" <?php if ($authorization_level < 4) echo "class='unclickable'"?>>User Management</a><br>
            <a href="stock_management/show_stock.php">Show Stock</a>
            <a href="stock_management/history_stock.php" <?php if ($authorization_level < 2) echo "class='unclickable'"?>>History Stock</a>
        </p>
    </body>
</html>
