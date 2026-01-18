<?php
session_start();
require_once "utils.php";
include "connect.php";
global $conn;
if ($conn -> connect_error) {
    die("MySQL Server Connection failure.".$conn -> connect_error);
}

$username = $password = "";
$sign_in_state = "";
# Get input content
if (isset($_POST['sign_in_submit']) &&  $_SERVER["REQUEST_METHOD"] = "POST")    {
    if (!empty($_POST["username"])) {
        $username = text_input($_POST["username"]);
    }
    if (!empty($_POST["password"])) {
        $password = text_input($_POST["password"]);
    }
}
# login
if (isset($_POST['sign_in_submit']) &&  $_SERVER["REQUEST_METHOD"] = "POST")    {
    if (!empty($username) && !empty($password)) {
        $hashed_password = hash("sha256", $password);
        $sql_login = "select exists(select * from users where username = '$username' and hashed_password = '$hashed_password') as 'is_exist'";
        $result = $conn -> query($sql_login);
        $rows = $result -> fetch_assoc();
        $login_approved = $rows['is_exist'][0];
        if ($login_approved) {
            $_SESSION['username'] = $username;
            $timestamp = time();
            # Create sign in log file
            $log_file_path = "logs/".$username.'_'.$timestamp.'.log';
            $_SESSION['log_file_path'] = $log_file_path;
            fopen($log_file_path, "a");
            redirect("workspace.php", 1, "Welcome, $username!");
        }
        else
            $sign_in_state = "Username or password is incorrect.";
    }
    else
        $sign_in_state = "Username or password cannot be empty.";
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>sign in</title>
    </head>
    <p>
        <a href="index.html">Back to Homepage</a>
    </p>
    <p>
        SIGN IN:
    </p>
    <form name="sign_up" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <p>
            Username:
            <input type="text" name="username" value="<?php echo $username; ?>">
        </p>
        <p>
            Password:
            <input type="password" name="password" value="<?php echo $password; ?>">
        </p>
        <p>
            <input type="submit" name="sign_in_submit" value="Sign in">
        </p>
    </form>
    <p>
        <?php echo $sign_in_state; ?>
    </p>
</html>
