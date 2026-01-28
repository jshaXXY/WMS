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
            $log_path = "logs/".$username.'_'.$timestamp.'.log';
            $_SESSION['log_path'] = $log_path;
            fopen($log_path, "a");
            redirect("workspace.php", 1, "Welcome, $username!");
        }
        else
            $sign_in_state = "Username or password is incorrect.";
    }
    else
        $sign_in_state = "Username or password cannot be empty.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link rel="stylesheet" href="css/auth.css">
</head>

<body>
<div class="card">
    <h1>Welcome Back</h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" value="<?php echo $password; ?>">
        </div>

        <input class="btn" type="submit" name="sign_in_submit" value="Sign In">
    </form>

    <?php if (!empty($sign_in_state)) { ?>
        <div class="message"><?php echo $sign_in_state; ?></div>
    <?php } ?>

    <div class="back-link">
        <a href="index.html">← Back to Homepage</a>
    </div>
</div>
</body>
</html>
