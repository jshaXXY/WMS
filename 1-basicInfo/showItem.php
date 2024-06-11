<?php

include "connect.php";
global $conn;
$sql = "select * from titem";
$result = $conn->query($sql);

?>

<html>
<head>
    <title>showOrder</title>
    <meta charset="UTF-8">
</head>
<body>
<p><a href="addItem.html">添加物品</a></p>
    <table border="1">
        <thead>
            <tr>
                <th>itemID</th>
                <th>itemName</th>
                <th>itemPallet</th>
                <th>in_stockSupply</th>
                <th>isStocked</th>
                <th>in_stockTime</th>
                <th>out_stockTime</th>
                <th>out_stockOrder</th>
                <th>DELETE</th>
                <th>MODIFY</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result)    {
            while ($rows = $result->fetch_assoc())   {
                echo "<tr>";
                echo "<td>".$rows['itemID']."</td>";
                echo "<td>".$rows['itemName']."</td>";
                echo "<td>".$rows['itemPallet']."</td>";
                echo "<td>".$rows['in_stockSupply']."</td>";
                echo "<td>".$rows['isStocked']."</td>";
                echo "<td>".$rows['in_stockTime']."</td>";
                echo "<td>".$rows['out_stockTime']."</td>";
                echo "<td>".$rows['out_stockOrder']."</td>";
                $ID = $rows['itemID'];
                echo "<td>"."<a href = 'deleteItem.php?d=$ID'>delete</a>"."</td>";
                echo "<td>"."<a href = 'modifyItem.php?m=$ID'>modify</a>"."</td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
</body>
</html>