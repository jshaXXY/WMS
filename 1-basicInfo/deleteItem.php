<?php

include "connect.php";
include "functions.php";
global $conn;

$ID = $_GET['d'];
$sql = "delete from titem where itemID = $ID";
$result = $conn->query($sql);

if ($result)    {
    redirect("showItem.php",1,"记录删除成功，1秒后返回");
}
else    {
    echo "Delete Error.";
}