<?php

include "connect.php";
include "functions.php";
global $conn;

$oID = $_GET['oID'];
$operatorName = $_POST['operatorName'];
$customerName = $_POST['customerName'];
$orderTime = $_POST['orderTime'];
$operatorID = Name2Number($operatorName, 'operator');
$customerID = Name2Number($customerName, 'customer');

$sql = "UPDATE torder SET orderTime='$orderTime', orderOperator=$operatorID, orderCustomer=$customerID WHERE orderID=$oID";

$result = $conn->query($sql);
if ($result)    {
    redirect("showOrder.php", 1, "订单修改成功，1秒后返回");
}
else echo "Modify Error!";