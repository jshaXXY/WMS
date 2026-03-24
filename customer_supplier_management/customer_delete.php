<?php
session_start();
require_once "../utils.php";
include "../connect.php";
global $conn;

$id = $_GET['id'];
$log_path = $_SESSION['log_path'];

$sql_inquiry = "select customer_name from customer where id = $id";
$result = $conn->query($sql_inquiry);
$row = $result->fetch_assoc();
$customer_name = $row['customer_name'];

if (isset($_POST['delete_confirm']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $sql_delete = "DELETE FROM customer WHERE id = $id";
    $conn->query($sql_delete);
    $timestamp = time();
    write_log($log_path, "Deleted customer $customer_name at ".$timestamp);
    redirect("customer_management.php", 2, "Deleted successfully.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Customer</title>

    <link rel="stylesheet" href="../css/user.css">

    <style>
        .confirm-card {
            max-width: 400px;
            margin: 50px auto;
            text-align: center;
            padding: 28px;
            background: rgba(255,255,255,0.95);
            border-radius: 14px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.25);
        }

        .confirm-card p {
            font-size: 16px;
            color: #111827;
            margin-bottom: 24px;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .btn-yes {
            background: #dc2626;
            color: white;
        }

        .btn-yes:hover {
            background: #b91c1c;
        }

        .btn-no {
            background: #6b7280;
            color: white;
        }

        .btn-no:hover {
            background: #4b5563;
        }

        input[type="submit"] {
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="confirm-card">
        <p>Are you sure you want to delete customer <b><?php echo htmlspecialchars($customer_name); ?></b>?</p>

        <div class="btn-group">
            <a class="btn btn-no" href="customer_management.php">No</a>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']."?id=".urlencode($id); ?>" style="display:inline;">
                <input class="btn btn-yes" type="submit" name="delete_confirm" value="Yes">
            </form>
        </div>
    </div>
</div>
</body>
</html>
