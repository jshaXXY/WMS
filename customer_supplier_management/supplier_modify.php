<?php
session_start();
require_once "../utils.php";
include "../connect.php";
global $conn;

$id = $_GET['id'];
$log_path = $_SESSION['log_path'];

if (isset($_POST['modify_submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $supplier_name = $_POST['supplier_name'];
    $sql_modify = "update supplier set supplier_name= '$supplier_name' where id = $id";
    $conn->query($sql_modify);

    $timestamp = time();
    write_log($log_path, "Modify supplier $supplier_name at " . $timestamp);

    redirect("supplier_management.php", 2, "Modified successfully.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Supplier</title>

    <link rel="stylesheet" href="../css/user.css">

    <style>
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

        .supplier-info {
            font-size: 14px;
            color: #374151;
            margin-bottom: 18px;
        }

        .supplier-info b {
            color: #111827;
        }

        .form-row {
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
        }

        input[type="text"] {
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            font-size: 14px;
            min-width: 200px;
            outline: none;
        }

        input[type="text"]:focus {
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
        <h1>Modify Supplier</h1>
        <a class="back-btn" href="supplier_management.php">← Back to Supplier Management</a>
    </div>

    <div class="form-card">
        <p class="sub-title">Modify Supplier Name</p>

        <div class="supplier-info">
            Current handling supplier ID:
            <b><?php echo htmlspecialchars($id); ?></b>
        </div>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . "?id=" . urlencode($id); ?>">
            <div class="form-row">
                <input type="text" id="supplier_name" name="supplier_name" placeholder="Enter new supplier name" required>

                <input class="btn btn-modify btn-submit" type="submit" name="modify_submit" value="Modify">
            </div>
        </form>
    </div>
</div>
</body>
</html>
