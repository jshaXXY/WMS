<?php
include "connect.php";
include "functions.php";
global $conn;

$dID = $_GET['dID'];
$oID = $_GET['orderID'];
$orderBatch = $_POST['orderBatch'];
$unitPrice = $_POST['unitPrice'];

$sql = "UPDATE torderDetail SET orderBatch=$orderBatch, unitPrice=$unitPrice WHERE detailID=$dID";

$result = $conn->query($sql);

if ($result)    {
    redirect('showOrderDetail.php?s='.$oID, 1, "修改成功，1秒后返回");
}
else echo "Modify Error!";