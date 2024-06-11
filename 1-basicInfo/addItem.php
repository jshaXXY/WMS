<?php

include "connect.php";
include "functions.php";
global $conn;

$itemName = $_POST['itemName'];
$itemPallet = $_POST['itemPallet'];
$in_stockSupply = $_POST['in_stockSupply'];
$isStocked = $_POST['isStocked'];
$in_stockTime = $_POST['in_stockTime'];
$out_stockTime = $_POST['out_stockTime'];
$out_stockOrder = $_POST['out_stockOrder'];

$sql = "INSERT INTO tItem VALUE(null, '$itemName', $itemPallet, $in_stockSupply, $isStocked, '$in_stockTime', '$out_stockTime', $out_stockOrder)";
$result = $conn->query($sql);
if ($result)    {
    redirect("showItem.php",1,"记录添加成功，1秒后返回");
}
else    {
    echo "Add Error.";
}