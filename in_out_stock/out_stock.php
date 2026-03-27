<?php
session_start();
require_once "../utils.php";
include "../connect.php";
global $conn;

$username = $_SESSION['username'];
$operator_id = $_SESSION['user_id'] ?? null;

if ($operator_id === null) {
    $sql_user = "select id from users where username='$username'";
    $result = $conn->query($sql_user);
    if ($row = $result->fetch_assoc()) {
        $operator_id = $row['id'];
    }
}

$order_id = "";
$item_id = "";
$customer_id = "";
$quantity = "";
$out_stock_time = date('Y-m-d\TH:i');
$warn_text = "";
$item_name = "";
$customer_name = "";
$stock_quantity = 0;
$can_submit = false;

if (isset($_GET['get_order_details']) && isset($_GET['order_id'])) {
    header('Content-Type: application/json');
    $order_id = intval($_GET['order_id']);

    $sql_order = "select `order`.id as order_id,
                         `order`.customer as customer_id,
                         `order`.order_item as item_id,
                         `order`.order_quantity,
                         customer.customer_name,
                         item.item_name,
                         item.quantity as stock_quantity
                  from `order`
                  left join customer on customer.id = `order`.customer
                  left join item on item.id = `order`.order_item
                  where `order`.id = $order_id";

    $result = $conn->query($sql_order);
    if ($row = $result->fetch_assoc()) {
        $can_submit = $row['stock_quantity'] >= $row['order_quantity'];
        echo json_encode([
            'success' => true,
            'order_id' => $row['order_id'],
            'item_id' => $row['item_id'],
            'item_name' => $row['item_name'],
            'customer_id' => $row['customer_id'],
            'customer_name' => $row['customer_name'],
            'quantity' => $row['order_quantity'],
            'stock_quantity' => $row['stock_quantity'],
            'can_submit' => $can_submit
        ]);
    } else {
        echo json_encode(['success' => false]);
    }
    exit();
}

if (isset($_POST['out_stock_submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $order_id = intval($_POST["order_id"]);
    $item_id = intval($_POST["out_stock_item"]);
    $customer_id = intval($_POST["out_stock_customer"]);
    $quantity = intval($_POST["out_stock_quantity"]);
    $out_stock_time = $_POST["out_stock_time"];

    if ($order_id != '') {

        $sql_stock = "select quantity from item where id = $item_id";
        $result = $conn->query($sql_stock);
        if ($row = $result->fetch_assoc()) {
            $stock_quantity = $row['quantity'];
        }

        if ($stock_quantity < $quantity) {
            $warn_text = "Insufficient stock! Available: $stock_quantity, Requested: $quantity.";
        } else {
            $sql_add_out_stock =
                    "insert into out_stock_record (record_time, `order`, operator)
                     values ('$out_stock_time', $order_id, $operator_id)";

            $conn->query($sql_add_out_stock);

            $sql_change_fulfillment = "update `order` set is_fulfilled = 1 where id = '$order_id'";
            $conn->query($sql_change_fulfillment);

            $sql_update_item =
                    "update item
                     set quantity = quantity - $quantity,
                         out_stock_time = '$out_stock_time',
                         customer = $customer_id
                     where id = $item_id";

            $conn->query($sql_update_item);

            write_log($_SESSION['log_path'], "out_stock record $conn->insert_id added at ".time());
            redirect("out_stock.php", 1, "Out-stock operation completed successfully.");
        }
    } else {
        $warn_text = "Please select an order.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Out Stock Operation</title>

    <link rel="stylesheet" href="../css/out_stock.css">
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Out Stock Operation</h1>

        <div>
            <a class="btn btn-back" href="../workspace.php">Back to Workspace</a>
        </div>
    </div>

    <div class="card">

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="outStockForm">

            <div class="form-grid">

                <div class="form-group">
                    <label>Order</label>
                    <select id="order_id" name="order_id" onchange="loadOrderDetails()">
                        <option value="" selected>Select an order</option>
                        <?php
                        $sql_orders = "select `order`.id, customer.customer_name, item.item_name, `order`.order_quantity
                                       from `order`
                                       left join customer on customer.id = `order`.customer
                                       left join item on item.id = `order`.order_item
                                       where `order`.is_fulfilled = 0
                                       order by `order`.order_time asc";
                        $result = $conn->query($sql_orders);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value=$row[id]>" . $row['customer_name'] . " - " . $row['item_name'] . " (Qty: " . $row['order_quantity'] . ")</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Item</label>
                    <input type="text" id="item_name" readonly>
                    <input type="hidden" id="out_stock_item" name="out_stock_item" value="<?php echo $item_id ?>">
                </div>

                <div class="form-group">
                    <label>Customer</label>
                    <input type="text" id="customer_name" readonly>
                    <input type="hidden" id="out_stock_customer" name="out_stock_customer" value="<?php echo $customer_id ?>">
                </div>

                <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" id="quantity_display" readonly>
                    <input type="hidden" id="out_stock_quantity" name="out_stock_quantity" value="<?php echo $quantity ?>">
                </div>

                <div class="form-group">
                    <label>Out Stock Time</label>
                    <input type="datetime-local" name="out_stock_time" value="<?php echo $out_stock_time ?>">
                </div>

            </div>

            <div class="form-actions">
                <input class="btn btn-add" type="submit" name="out_stock_submit" value="Submit Out-Stock" id="submitBtn" disabled>
            </div>

        </form>

        <?php
        if ($warn_text != "") {
            echo "<div class='message'>$warn_text</div>";
        }
        ?>

    </div>

</div>

<script>
function loadOrderDetails() {
    const orderId = document.getElementById('order_id').value;
    const submitBtn = document.getElementById('submitBtn');

    if (!orderId) {
        document.getElementById('item_name').value = '';
        document.getElementById('customer_name').value = '';
        document.getElementById('quantity_display').value = '';
        document.getElementById('out_stock_item').value = '';
        document.getElementById('out_stock_customer').value = '';
        submitBtn.disabled = true;
        return;
    }

    fetch('?get_order_details=1&order_id=' + orderId)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('item_name').value = data.item_name;
                document.getElementById('customer_name').value = data.customer_name;
                document.getElementById('quantity_display').value = data.quantity;
                document.getElementById('out_stock_item').value = data.item_id;
                document.getElementById('out_stock_customer').value = data.customer_id;
                document.getElementById('out_stock_quantity').value = data.quantity;
                submitBtn.disabled = !data.can_submit;
            }
        })
        .catch(error => {
            console.error('Error loading order details:', error);
        });
}
</script>

</body>
</html>
