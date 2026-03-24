<?php
session_start();
require_once "../utils.php";
include "../connect.php";
global $conn;

$item = "";
$customer = "";
$order_quantity = "";
$order_time = "";
$warn_text = "";

if (isset($_POST['order_submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["order_item"] != '' &&
            $_POST["order_customer"] != '' &&
            $_POST["order_quantity"] != '' &&
            $_POST["order_time"] != '') {

        $item = $_POST["order_item"];
        $customer = $_POST["order_customer"];
        $order_quantity = $_POST["order_quantity"];
        $order_time = $_POST["order_time"];

        $sql_add_order =
                "insert into `order`(customer, order_item, order_quantity, order_time, is_fulfilled)
             values ('$customer', '$item', '$order_quantity', '$order_time', 0)";

        $conn->query($sql_add_order);
        write_log($_SESSION['log_path'], "added order $conn->insert_id at ".time()); //$conn -> insert_id: Return last inserted id.
        redirect("order.php", 1, "Order added successfully.");
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
    <title>Add Order</title>

    <link rel="stylesheet" href="../css/order.css">
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Add Order</h1>

        <div>
            <a class="btn btn-back" href="order.php">Back to Orders</a>
        </div>
    </div>

    <div class="card">

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <div class="form-grid">

                <div class="form-group">
                    <label>Item</label>
                    <?php select_options("item", "order_item", "order_item"); ?>
                </div>

                <div class="form-group">
                    <label>Customer</label>
                    <?php select_options("customer", "order_customer", "order_customer"); ?>
                </div>

                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="order_quantity" value="<?php echo $order_quantity ?>">
                </div>

                <div class="form-group">
                    <label>Order Time</label>
                    <input type="datetime-local" name="order_time" value="<?php echo $order_time ?>">
                </div>

            </div>

            <div class="form-actions">
                <input class="btn btn-add" type="submit" name="order_submit" value="Submit Order">
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