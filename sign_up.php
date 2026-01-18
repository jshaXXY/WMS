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
                $sql_insert_user = "insert into users values ('$username', '$hashed_password')";
                $conn -> query($sql_insert_user);
                redirect("sign_in.php", 1, "Sign up successfully, redirecting to login page.");
            }
            else
                $sign_up_state = "Username already exists.";
        }
        else
            $sign_up_state = "Password and Confirm Password do not match.";
    }
    else
        $sign_up_state = "Username and password cannot be empty.";
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>sign up</title>
</head>
<body>
    <p>
        <a href="index.html">Back to Homepage</a>
    </p>
    <p>
        SIGN UP:
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
            Confirm Password:
            <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
        </p>
        <p>
            <input type="submit" name="sign_up_submit" value="Sign up">
        </p>
    </form>
    <p>
        <?php echo $sign_up_state; ?>
    </p>
</body>
</html>