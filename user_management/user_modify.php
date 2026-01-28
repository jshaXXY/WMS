<?php
session_start();
require_once "../utils.php";
include "../connect.php";
global $conn;

$username = $_GET['u'];
$log_path = $_SESSION['log_path'];

if (isset($_POST['modify_submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $level = $_POST['level'];
    $sql_modify = "update users set `authorization level`= $level where username = '$username'";
    $conn->query($sql_modify);

    $timestamp = time();
    write_log($log_path, "Modify the authorization level of user $username to $level at " . $timestamp);

    redirect("user_management.php", 2, "Modified successfully.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify User</title>

    <!-- Use shared CSS -->
    <link rel="stylesheet" href="../css/user.css">

    <style>
        /* Extra form styling (small & clean) */
        .form-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 22px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        .sub-title {
            margin: 0 0 14px;
            font-size: 16px;
            font-weight: bold;
            color: #111827;
        }

        .user-info {
            font-size: 14px;
            color: #374151;
            margin-bottom: 18px;
        }

        .user-info b {
            color: #111827;
        }

        .form-row {
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
        }

        select {
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            font-size: 14px;
            min-width: 120px;
            outline: none;
        }

        select:focus {
            border-color: #6366f1;
        }

        .btn-submit {
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="header">
        <h1>Modify User</h1>
        <a class="back-btn" href="user_management.php">← Back to User Management</a>
    </div>

    <div class="form-card">
        <p class="sub-title">Modify Authorization Level</p>

        <div class="user-info">
            Current handling user:
            <b><?php echo htmlspecialchars($username); ?></b>
        </div>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . "?u=" . urlencode($username); ?>">
            <div class="form-row">
                <select id="level" name="level">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <input class="btn btn-modify btn-submit" type="submit" name="modify_submit" value="Modify">
            </div>
        </form>
    </div>

    <div class="note">
        Tip: Authorization level 5 is usually the highest admin privilege.
    </div>
</div>
</body>
</html>
