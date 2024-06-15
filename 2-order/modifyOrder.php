<?php

include "connect.php";
include "functions.php";
global $conn;

$oID = $_GET['m'];

$sql = "
SELECT
	orderTime,
	toperator.operatorName,
	tcustomer.customerName 
FROM
	torder
	LEFT JOIN toperator ON toperator.OperatorID = torder.orderOperator
	LEFT JOIN tcustomer ON tcustomer.customerID = torder.orderCustomer
WHERE torder.orderID = $oID";

$result = $conn->query($sql);
while ($rows = $result->fetch_assoc())  {
    $orderTime = $rows['orderTime'];
    $operatorName = $rows['operatorName'];
    $customerName = $rows['customerName'];
}
?>

<html>
<head>
    <title>modifyOrder</title>
    <meta charset="UTF-8"></head>
<body>
<form action="<?php echo "modifyOrderSave.php?oID=".$oID;?>" method="post">
    <p>订单号：<?php echo $oID;?></p>
    <p>订货时间：<input type="text" name="orderTime" id="orderTime" value=<?php echo $orderTime;?>></p>
    <p>客户：<?php fetchNameList('customer', 'customerName', $customerName);?></p>
    <p>操作员：<?php fetchNameList('operator', 'operatorName', $operatorName);?></p>
    <p><input type="submit" value="提交" name="Submit"></p>
</form>
<a href="showOrder.php">返回订单页</a>
</body>
</html>