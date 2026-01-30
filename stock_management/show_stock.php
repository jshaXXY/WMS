<?php
require_once "../utils.php";
include "../connect.php";
global $conn;

$sku = "";
$name = "";
$supplier = "";
$customer = "";
$in_time_comparison = "";
$in_stock_time = "";

$sql_sku = "";
$sql_name = "";
$sql_supplier = "";
$sql_customer = "";
$sql_in_stock_time = "";
$sql_out_stock_time = "";
$sql_is_instock = " and is_instock = 1";

$result = null;

if (isset($_POST['search_submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["sku"])) {
        $sku = text_input($_POST["sku"]);
        $sql_sku = " and sku like '%$sku%'";
    }
    if (!empty($_POST["name"])) {
        $name = text_input($_POST["name"]);
        $sql_name = " and name like '%$name%'";
    }
    if (!empty($_POST["search_supplier"])) {
        $supplier = $_POST["search_supplier"];
        $sql_supplier = " and supplier = '$supplier'";
    }
    if (!empty($_POST["search_customer"])) {
        $customer = $_POST["search_customer"];
        $sql_customer = " and customer = '$customer'";
    }
    if (!empty($_POST["in_stock_time"])) {
        $in_time_comparison = $_POST["in_time_comparison"];
        $in_stock_time = $_POST["in_stock_time"];
        if ($in_time_comparison == "earlier_than") {
            $sql_in_stock_time = " and in_stock_time <= '$in_stock_time'";
        } else {
            $sql_in_stock_time = " and in_stock_time >= '$in_stock_time'";
        }
    }

    $sql_inquiry =
            "select item.id,
                item.sku,
                item.name,
                supplier.supplier_name,
                customer.customer_name,
                item.in_stock_time
        from item
                left join supplier on item.supplier=supplier.id
                left join customer on item.customer=customer.id
        where true"
            . $sql_sku . $sql_name . $sql_supplier . $sql_customer . $sql_in_stock_time . $sql_is_instock;

    $result = $conn->query($sql_inquiry);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Stock</title>

    <link rel="stylesheet" href="../css/stock.css">
</head>

<body>
<div class="container">

    <div class="header">
        <h1>Show Stock</h1>
        <a class="back-btn" href="../workspace.php">← Back to Workspace</a>
    </div>

    <div class="card">
        <div class="card-title">Search Item</div>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-grid">

                <div class="form-group">
                    <label>SKU</label>
                    <input type="text" name="sku" value="<?php echo $sku; ?>">
                </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo $name; ?>">
                </div>

                <div class="form-group">
                    <label>Supplier</label>
                    <?php select_options("supplier", "search_supplier", "search_supplier"); ?>
                </div>

                <div class="form-group">
                    <label>Customer</label>
                    <?php select_options("customer", "search_customer", "search_customer"); ?>
                </div>

                <div class="form-group">
                    <label>In Stock Time Filter</label>
                    <select id="in_time_comparison" name="in_time_comparison">
                        <option value="earlier_than">Earlier than</option>
                        <option value="later_than">Later than</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>In Stock Time</label>
                    <input type="datetime-local" name="in_stock_time" value="<?php echo $in_stock_time; ?>">
                </div>

            </div>

            <div class="actions">
                <button class="btn btn-primary" type="submit" name="search_submit">
                    Search
                </button>
            </div>
        </form>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>SKU</th>
                <th>Name</th>
                <th>Supplier</th>
                <th>Customer</th>
                <th>In Stock Time</th>
            </tr>
            </thead>

            <tbody>
            <?php
            if ($result != null) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['sku'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['supplier_name'] . "</td>";
                    echo "<td>" . $row['customer_name'] . "</td>";
                    echo "<td>" . $row['in_stock_time'] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </div>

    <div class="note">
        Tip: You can search by partial SKU/Name, and filter by supplier/customer/time.
    </div>

</div>
</body>
</html>