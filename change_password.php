<?php
session_start();
require_once "utils.php";
include "connect.php";
global $conn;

$username = $_SESSION['username'];
$log_path = $_SESSION['log_path'];

$original_password = $new_password = $confirm_new_password = "";
$change_state = "";

# Get input content
if (isset($_POST['change_submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["original_password"])) {
        $original_password = text_input($_POST["original_password"]);
    }
    if (!empty($_POST["new_password"])) {
        $new_password = text_input($_POST["new_password"]);
    }
    if (!empty($_POST["confirm_new_password"])) {
        $confirm_new_password = text_input($_POST["confirm_new_password"]);
    }
}

# Change password
if (isset($_POST['change_submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($original_password) && !empty($new_password) && !empty($confirm_new_password)) {

        if ($new_password == $confirm_new_password) {
            $hashed_original_password = hash("sha256", $original_password);

            $sql_check_original_password =
                "select exists(select * from users where username = '$username' and hashed_password = '$hashed_original_password') as 'is_correct'";

            $result = $conn->query($sql_check_original_password);
            $rows = $result->fetch_assoc();
            $password_correct = $rows['is_correct'][0];

            if ($password_correct) {
                $new_hashed_password = hash("sha256", $new_password);

                $sql_change_password =
                    "update users set hashed_password = '$new_hashed_password' where username = '$username'";

                $conn->query($sql_change_password);

                $timestamp = time();
                write_log($log_path, "Password Changed at $timestamp");

                redirect("workspace.php", 2, "Change password successfully.");
            } else {
                $change_state = "Original password is not correct.";
            }
        } else {
            $change_state = "New passwords do not match.";
        }
    } else {
        $change_state = "Original password or new password cannot be empty.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

    <link rel="stylesheet" href="css/auth.css">
</head>

<body>
<div class="card">
    <h1>Change Password</h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <div class="form-group">
            <label>Original Password</label>
            <input type="password" name="original_password" value="<?php echo $original_password; ?>">
        </div>

        <div class="form-group">
            <label>New Password</label>
            <input type="password" name="new_password" value="<?php echo $new_password; ?>">
        </div>

        <div class="form-group">
            <label>Confirm New Password</label>
            <input type="password" name="confirm_new_password" value="<?php echo $confirm_new_password; ?>">
        </div>

        <input class="btn" type="submit" name="change_submit" value="Change Password">
    </form>

    <?php if (!empty($change_state)) { ?>
        <div class="message"><?php echo $change_state; ?></div>
    <?php } ?>

    <div class="back-link">
        <a href="workspace.php">← Back to Workspace</a>
    </div>
</div>
</body>
</html>
