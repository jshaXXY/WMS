<?php
session_start();
require_once "../utils.php";
include "../connect.php";
global $conn;

$username = $_SESSION['username'];
$operator_id = $_SESSION['user_id'] ?? null;

# Get operator ID from username if not in session
if ($operator_id === null) {
    $sql_user = "select id from users where username='$username'";
    $result = $conn->query($sql_user);
    if ($row = $result->fetch_assoc()) {
        $operator_id = $row['id'];
    }
}

$item = "";
$supplier = "";
$quantity = "";
$in_stock_time = date('Y-m-d\TH:i');
$warn_text = "";

if (isset($_POST['in_stock_submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["in_stock_item"] != '' &&
            $_POST["in_stock_supplier"] != '' &&
            $_POST["in_stock_quantity"] != '' &&
            $_POST["in_stock_time"] != '') {

        $item = $_POST["in_stock_item"];
        $supplier = $_POST["in_stock_supplier"];
        $quantity = $_POST["in_stock_quantity"];
        $in_stock_time = $_POST["in_stock_time"];

        # Insert record into in_stock_record table
        $sql_add_in_stock =
                "insert into in_stock_record (record_time, supplier, item, quantity, operator)
             values ('$in_stock_time', '$supplier', '$item', '$quantity', '$operator_id')";

        $conn->query($sql_add_in_stock);

        # Update item table: update quantity and in_stock_time
        $sql_update_item =
                "update item
                 set quantity = quantity + '$quantity',
                     in_stock_time = '$in_stock_time',
                     supplier = '$supplier'
                 where id = '$item'";

        $conn->query($sql_update_item);

        write_log($_SESSION['log_path'], "in_stock record $conn->insert_id added at ".time());
        redirect("in_stock.php", 1, "In-stock operation completed successfully.");
    }
    else {
        $warn_text = "Please enter all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>In Stock Operation</title>

    <link rel="stylesheet" href="../css/in_stock.css">
</head>

<body>

<div class="container">

    <div class="header">
        <h1>In Stock Operation</h1>

        <div>
            <a class="btn btn-back" href="../workspace.php">Back to Workspace</a>
        </div>
    </div>

    <div class="card">

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <div class="form-grid">

                <div class="form-group">
                    <label>Item</label>
                    <?php select_options("item", "in_stock_item", "in_stock_item"); ?>
                </div>

                <div class="form-group">
                    <label>Supplier</label>
                    <?php select_options("supplier", "in_stock_supplier", "in_stock_supplier"); ?>
                </div>

                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="in_stock_quantity" value="<?php echo $quantity ?>" min="1">
                </div>

                <div class="form-group">
                    <label>In Stock Time</label>
                    <input type="datetime-local" name="in_stock_time" value="<?php echo $in_stock_time ?>">
                </div>

            </div>

            <div class="form-actions">
                <input class="btn btn-add" type="submit" name="in_stock_submit" value="Submit In-Stock">
            </div>

        </form>

        <?php
        if ($warn_text != "") {
            echo "<div class='message'>$warn_text</div>";
        }
        ?>

    </div>

</div>

</body>
</html>
