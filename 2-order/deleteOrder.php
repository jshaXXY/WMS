<?php

include "connect.php";
include "functions.php";
global $conn;

$ID = $_GET['d'];
$sql1 = "DELETE FROM tOrder WHERE orderID = $ID";
$sql2 = "DELETE FROM tOrderDetail WHERE orderID = $ID";
$result = $conn->query($sql1);
$result = $conn->query($sql2);

if ($result)    {
    redirect("showOrder.php",1,"订单删除成功，1秒后返回");
}
else    {
    echo "Delete Error.";
}