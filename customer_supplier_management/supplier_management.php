<?php
session_start();
include "../connect.php";
global $conn;

$sql_query = "select id, supplier_name from supplier";
$result = $conn->query($sql_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Management</title>
    <link rel="stylesheet" href="../css/user.css">
</head>

<body>
<div class="container">
    <div class="header">
        <h1>Supplier Management</h1>
        <a class="back-btn" href="../workspace.php">← Back to Workspace</a>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Supplier Name</th>
                <th>Modify</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['supplier_name'] . "</td>";
                echo "<td><a class='btn btn-modify' href='supplier_modify.php?id=$row[id]'>MODIFY</a></td>";
                echo "<td><a class='btn btn-delete' href='supplier_delete.php?id=$row[id]'>DELETE</a></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

    <div class="note">
        Tip: Use "Modify" to update supplier information, and "Delete" to remove a supplier.
    </div>
</div>
</body>
</html>
