<?php

include "connect.php";
include "functions.php";
global $conn;

$oID = $_GET['s'];
$itemName = $_POST['itemName'];
$orderBatch = $_POST['orderBatch'];
$unitPrice = $_POST['unitPrice'];

$sql_item = "INSERT INTO titem VALUE (null, '$itemName', null, null, null, null, null, $oID)";
$result1 = $conn->query($sql_item);

$itemID = Name2Number($itemName, 'item');

$sql_orderDetail = "INSERT INTO torderDetail VALUE (null, $orderBatch, $itemID, $unitPrice, $oID)";
$result2 = $conn->query($sql_orderDetail);

if ($result2)    {
    redirect("showOrderDetail.php?s=".$oID,1,"物品添加成功，1秒后返回");
}
else    {
    echo "Add Error.";
}