<?php

include "connect.php";
include "functions.php";
global $conn;

$ID = $_GET['m'];

$itemName = $_POST['itemName'];
$itemPallet = $_POST['itemPallet'];
$in_stockSupply = $_POST['in_stockSupply'];
$isStocked = $_POST['isStocked'];
$in_stockTime = $_POST['in_stockTime'];
$out_stockTime = $_POST['out_stockTime'];
$out_stockOrder = $_POST['out_stockOrder'];

$sql = "UPDATE titem SET itemName = '$itemName',itemPallet = $itemPallet,in_stockSupply = $in_stockSupply,isStocked = $isStocked,in_stockTime = '$in_stockTime',out_stockTime = '$out_stockTime',out_stockOrder = $out_stockOrder WHERE itemID = $ID";

$result = $conn->query($sql);
if ($result)    {
    redirect("showItem.php",1,"记录修改成功，1秒后返回");
}
else    {
    echo "Modify Error.";
}