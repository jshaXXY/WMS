<?php
include "../connect.php";
global $conn;

$sql_inquiry = "select customer.customer_name,
                       item.item_name,
                       `order`.order_quantity,
                       `order`.order_time,
                       `order`.is_fulfilled
                from `order`
                left join customer on customer.id = `order`.customer
                left join item on item.id = `order`.order_item
                order by `order`.order_time asc";

$result = $conn->query($sql_inquiry);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order</title>

    <link rel="stylesheet" href="../css/order.css">
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Order Management</h1>

        <div>
            <a class="btn btn-back" href="../workspace.php">Back to Workspace</a>
            <a class="btn btn-add" href="add_order.php">Add Order</a>
        </div>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
            <tr>
                <th>Customer</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Order Time</th>
                <th>Is fulfilled</th>
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
                    echo "<td>" . $row['is_fulfilled'] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
            </tbody>

        </table>
    </div>

</div>

</body>
</html>