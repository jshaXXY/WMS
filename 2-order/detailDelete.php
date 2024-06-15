<?php

include "connect.php";
include "functions.php";
global $conn;

$dID = $_GET['d'];
$oID = $_GET['oID'];

$sql = "DELETE FROM torderDetail WHERE detailID=$dID";

$result = $conn->query($sql);
if ($result)    {
    redirect("showOrderDetail.php?s=$oID", 1, "物品删除成功，1秒后返回");
}
else echo "DELETE ERROR!";