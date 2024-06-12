<?php

include "connect.php";
global $conn;

$oID = $_GET['s'];
$sql = "
SELECT
	itemName,orderBatch,unitPrice,customerName,OperatorName,orderTime
FROM
	vw_orderDetail
where orderID = $oID
";

$result = $conn->query($sql);

?>

<html>
<head>
    <title>showOrder</title>
    <meta charset="UTF-8">
</head>
<body>
<p><a href="showOrder.php">回到订单</a></p>
<p><a href=<?php echo 'addOrderDetail.php?id='.$oID;?>>添加物品</a></p>
<table border="1">
    <thead>
    <tr>
        <th>品名</th>
        <th>订货批量</th>
        <th>订货单价</th>
        <th>客户</th>
        <th>操作员</th>
        <th>订单时间</th>
        <th>修改</th>
        <th>删除</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($result)    {
        while ($rows = $result->fetch_assoc())   {
            echo "<tr>";
            echo "<td>".$rows['itemName']."</td>";
            echo "<td>".$rows['orderBatch']."</td>";
            echo "<td>".$rows['unitPrice']."</td>";
            echo "<td>".$rows['customerName']."</td>";
            echo "<td>".$rows['OperatorName']."</td>";
            echo "<td>".$rows['orderTime']."</td>";
            echo "</tr>";
        }
    }
    ?>
    </tbody>
</table>
</body>
</html>