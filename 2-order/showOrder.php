<?php

include "connect.php";
global $conn;

$sql = "
SELECT
	torder.orderID,
	tcustomer.customerName,
	torder.orderTime,
	vw_totalprice.price
FROM
	torder
	LEFT JOIN tcustomer ON torder.orderCustomer = tcustomer.customerID
	LEFT JOIN vw_totalprice ON torder.orderID = vw_totalprice.orderID";

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
        <th>订单总价</th>
        <th>详情</th>
        <th>修改</th>
        <th>删除</th>
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
            echo "<td>".$rows['price']."</td>";
            $ID = $rows['orderID'];
            echo "<td>"."<a href = 'showOrderDetail.php?s=$ID'>查看</a>"."</td>";
            echo "<td>"."<a href = 'modifyOrder.php?m=$ID'>修改</a>"."</td>";
            echo "<td>"."<a href = 'deleteOrder.php?d=$ID'>删除</a>"."</td>";
            echo "</tr>";
        }
    }
    ?>
    </tbody>
</table>
</body>
</html>