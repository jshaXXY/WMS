<?php
session_start();
include "../connect.php";
global $conn;
$username = $_SESSION['username'];

# exit if not authorized
$authorization_level = $_SESSION['authorization_level'];
if ($authorization_level != '5') {
    exit();
}

$sql_query = "select username, `authorization level` from users where username != '$username'";
$result = $conn->query($sql_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="../css/user.css">
</head>

<body>
<div class="container">
    <div class="header">
        <h1>User Management</h1>
        <a class="back-btn" href="../workspace.php">← Back to Workspace</a>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
            <tr>
                <th>Username</th>
                <th>Authorization Level</th>
                <th>Modify</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['authorization level'] . "</td>";
                echo "<td><a class='btn btn-modify' href='user_modify.php?u=$row[username]'>MODIFY</a></td>";
                echo "<td><a class='btn btn-delete' href='user_delete.php?u=$row[username]'>DELETE</a></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

    <div class="note">
        Tip: Use "Modify" to update user permissions, and "Delete" to remove a user.
    </div>
</div>
</body>
</html>
