<?php
include "connect.php";
include "functions.php";
global $conn;

$dID = $_GET['m'];
$sql = "SELECT orderBatch, unitPrice, titem.itemName, orderID FROM torderDetail LEFT JOIN titem ON torderdetail.orderItem = titem.itemID WHERE detailID=$dID";
$result = $conn->query($sql);
while ($rows = $result->fetch_assoc())  {
    $orderBatch = $rows['orderBatch'];
    $unitPrice = $rows['unitPrice'];
    $itemName = $rows['itemName'];
    $orderID = $rows['orderID'];
}
?>

<html>
<head>
    <title>detailModify</title>
    <meta charset="UTF-8"></head>
<body>
    <form action="<?php echo "detailModifySave.php?dID=".$dID."&orderID=".$orderID;?>" method="post">
        <p>货品名：<?php echo $itemName;?></p>
        <p>订货批量：<input type="text" name="orderBatch" id="orderBatch" value=<?php echo $orderBatch;?>></p>
        <p>订货单价：<input type="text" name="unitPrice" id="unitPrice" value=<?php echo $unitPrice;?>></p>
        <p><input type="submit" value="提交" name="Submit"></p>
    </form>
    <a href=<?php echo "showOrderDetail.php?s=".$orderID;?>>返回订单详情</a>
</body>
</html><?php?>