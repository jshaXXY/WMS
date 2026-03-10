<?php
include "../connect.php";
global $conn;

$sql_inquiry = "select customer.customer_name,
                       item.item_name,
                       order.order_quantity,
                       order.order_time
                from `order`
            left join customer on customer.id = `order`.customer
            left join item on item.id = `order`.order_item";

$result = $conn->query($sql_inquiry);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order</title>
</head>
<body>
    <a href="../workspace.php">Back to Workspace</a><br>
    <a href="add_order.php">Add Order</a>
    <table>
        <thead>
            <tr>
                <th>Customer</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Order Time</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result != null) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['customer_name'] . "</td>";
                echo "<td>" . $row['item_name'] . "</td>";
                echo "<td>" . $row['order_quantity'] . "</td>";
                echo "<td>" . $row['order_time'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
</body>
</html>
