<?php

include "connect.php";
include "functions.php";
global $conn;

$customerName = $_POST['customer'];
$operatorName = $_POST['operator'];
$customerNum = Name2Number($customerName, 'customer');
$operatorNum = Name2Number($operatorName, 'operator');
$orderTime = $_POST['orderTime'];

$sql = "INSERT INTO tOrder VALUE (null, '$orderTime', $operatorNum, $customerNum)";

$result = $conn->query($sql);

if ($result)    {
    redirect("showOrder.php",1,"订单添加成功，1秒后返回");
}
else    {
    echo "Add Error.";
}