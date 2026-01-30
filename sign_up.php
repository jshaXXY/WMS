<?php
require_once "utils.php";
include "connect.php";
global $conn;
if ($conn -> connect_error) {
    die("MySQL Server Connection failure.".$conn -> connect_error);
}

$username = $password = $confirm_password = "";
$sign_up_state = "";

# Get input content
if (isset($_POST['sign_up_submit']) &&  $_SERVER["REQUEST_METHOD"] = "POST") {
    if (!empty($_POST["username"])) {
        $username = text_input($_POST["username"]);
    }
    if (!empty($_POST["password"])) {
        $password = text_input($_POST["password"]);
    }
    if (!empty($_POST["confirm_password"])) {
        $confirm_password = text_input($_POST["confirm_password"]);
    }
}

# Check the validity of username and password
if (isset($_POST['sign_up_submit']) &&  $_SERVER["REQUEST_METHOD"] = "POST")    {
    if (!empty($username) && !empty($password) && !empty($confirm_password)) {
        if ($password == $confirm_password) {
            $sql_check_username_exist = "select exists(select * from users where username = '$username') as 'is_exist'";
            $result = $conn -> query($sql_check_username_exist);
            $rows = $result -> fetch_assoc();
            $is_username_existed = $rows['is_exist'][0];
            if (!$is_username_existed) {
                $hashed_password = hash('sha256', $password);
                $sql_insert_user = "insert into users values ('$username', '$hashed_password', 0)";
                $conn -> query($sql_insert_user);
                redirect("sign_in.php", 2, "Sign up successfully, redirecting to login page.");
            }
            else
                $sign_up_state = "Username already exists.";
        }
        else
            $sign_up_state = "Password and confirm password do not match.";
    }
    else
        $sign_up_state = "Username or password cannot be empty.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/auth.css">
</head>

<body>
<div class="card">
    <h1>Create Account</h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" value="<?php echo $password; ?>">
        </div>

        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
        </div>

        <input class="btn" type="submit" name="sign_up_submit" value="Sign Up">
    </form>

    <?php if (!empty($sign_up_state)) { ?>
        <div class="message"><?php echo $sign_up_state; ?></div>
    <?php } ?>

    <div class="back-link">
        <a href="index.html">← Back to Homepage</a>
    </div>
</div>
</body>
</html>