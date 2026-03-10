<?php
require_once "../utils.php";
include "../connect.php";
global $conn;

$item = "";
$customer = "";
$order_quantity = "";
$order_time = "";
$warn_text = "";

if (isset($_POST['order_submit']) &&  $_SERVER["REQUEST_METHOD"] = "POST")  {
    if ($_POST["order_item"] != '' && $_POST["order_customer"] != '' && $_POST["order_quantity"] != '' && $_POST["order_time"] != '') {
        $item = $_POST["order_item"];
        $customer = $_POST["order_customer"];
        $order_quantity = $_POST["order_quantity"];
        $order_time = $_POST["order_time"];
        $sql_add_order = "insert into `order`(customer, order_item, order_quantity, order_time) values ('$customer', '$item', '$order_quantity', '$order_time')";
        $conn -> query($sql_add_order);
        redirect("order.php", 1, "Order added successfully.");
    }
    else    {
        $warn_text = "Please enter all fields";
    }

}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Order</title>
</head>
<body>
    <p><a href="order.php">Back to Order Page</a></p>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <p>item: <?php select_options("item", "order_item", "order_item");?></p>
        <p>customer: <?php select_options("customer", "order_customer", "order_customer");?></p>
        <p>quantity: <input type="text" name="order_quantity" value="<?php echo $order_quantity?>"></p>
        <p>order time: <input type="datetime-local" name="order_time" value="<?php echo $order_time?>"></p>
        <p><input type="submit" name="order_submit" value="Submit Order"></p>
    </form>
    <?php echo $warn_text; ?>
</body>
</html>
