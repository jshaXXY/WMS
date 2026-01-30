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
$out_time_comparison = "";
$out_stock_time = "";
$is_instock = "";

$sql_sku = "";
$sql_name = "";
$sql_supplier = "";
$sql_customer = "";
$sql_in_stock_time = "";
$sql_out_stock_time = "";
$sql_is_instock = "";

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
    if (!empty($_POST["out_stock_time"])) {
        $out_time_comparison = $_POST["out_time_comparison"];
        $out_stock_time = $_POST["out_stock_time"];
        if ($out_time_comparison == "earlier_than") {
            $sql_out_stock_time = " and out_stock_time <= '$out_stock_time'";
        } else {
            $sql_out_stock_time = " and out_stock_time >= '$out_stock_time'";
        }
    }
    if (isset($_POST["is_instock"]) && $_POST["is_instock"] != '') {
        $is_instock = $_POST["is_instock"];
        $sql_is_instock = " and is_instock = '$is_instock'";
    }

    $sql_inquiry =
        "select item.id,
                item.sku,
                item.name,
                supplier.supplier_name,
                customer.customer_name,
                item.in_stock_time,
                item.out_stock_time,
                item.is_instock
        from item
                left join supplier on item.supplier=supplier.id
                left join customer on item.customer=customer.id
        where true"
        . $sql_sku . $sql_name . $sql_supplier . $sql_customer . $sql_in_stock_time . $sql_out_stock_time . $sql_is_instock;

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
        <h1>History Stock</h1>
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

                <div class="form-group">
                    <label>Out Stock Time Filter</label>
                    <select id="out_time_comparison" name="out_time_comparison">
                        <option value="earlier_than">Earlier than</option>
                        <option value="later_than">Later than</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Out Stock Time</label>
                    <input type="datetime-local" name="out_stock_time" value="<?php echo $out_stock_time; ?>">
                </div>

                <div class="form-group">
                    <label>Is in stock</label>
                    <select id="is_instock" name="is_instock">
                        <option value='' selected>null</option>
                        <option value=1>In stock</option>
                        <option value=0>Out of stock</option>
                    </select>
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
                <th>Out Stock Time</th>
                <th>Is in stock</th>
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
                    echo "<td>" . $row['out_stock_time'] . "</td>";
                    echo "<td>" . $row['is_instock'] . "</td>";
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