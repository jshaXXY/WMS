<?php

include "connect.php";
global $conn;

$sql = "
SELECT
	orderID,
	tcustomer.customerName,
	orderTime 
FROM
	torder
	LEFT JOIN tcustomer ON torder.orderCustomer = tcustomer.customerID";

$result = $conn->query($sql);

?>

<html>
<head>
    <title>showOrder</title>
    <meta charset="UTF-8">
</head>
<body>
<p><a href="addOrder.php">添加订单</a></p>
<table border="1">
    <thead>
    <tr>
        <th>订单号</th>
        <th>客户</th>
        <th>订单时间</th>
        <th>查看</th>
        <th>更改</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($result)    {
        while ($rows = $result->fetch_assoc())   {
            echo "<tr>";
            echo "<td>".$rows['orderID']."</td>";
            echo "<td>".$rows['customerName']."</td>";
            echo "<td>".$rows['orderTime']."</td>";
            $ID = $rows['orderID'];
            echo "<td>"."<a href = 'showOrderDetail.php?s=$ID'>查看</a>"."</td>";
            echo "<td>"."<a href = 'modifyOrder.php?m=$ID'>更改</a>"."</td>";
            echo "</tr>";
        }
    }
    ?>
    </tbody>
</table>
</body>
</html>