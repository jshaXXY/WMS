<?php

include "connect.php";
include "functions.php";
global $conn;
$ID = $_GET['m'];
$sql = "select * from titem where itemID = $ID";
$result = $conn->query($sql);
if ($result)    {
    while ($rows = $result->fetch_assoc())   {
        $itemName = $rows['itemName'];
        $itemPallet = $rows['itemPallet'];
        $in_stockSupply = $rows['in_stockSupply'];
        $isStocked = $rows['isStocked'];
        $in_stockTime = $rows['in_stockTime'];
        $out_stockTime = $rows['out_stockTime'];
        $out_stockOrder = $rows['out_stockOrder'];
    }
}

?>

<html>
<head>
    <title>modifyOrder</title>
    <meta charset="UTF-8">
</head>
<body>
<form action=<?php echo "modifyItemSave.php?m=".$ID?> method="post">
    itemID:<?php echo $ID;?><br>
    itemName:<input type="text" name="itemName" id="itemName" value="<?php echo $itemName?>"><br>
    itemPallet:<input type="text" name="itemPallet" id="itemPallet" value="<?php echo $itemPallet?>"><br>
    in_stockSupply:<input type="text" name="in_stockSupply" id="in_stockSupply" value="<?php echo $in_stockSupply?>"><br>
    isStocked:<input type="text" name="isStocked" id="isStocked" value="<?php echo $isStocked?>"><br>
    in_stockTime:<input type="text" name="in_stockTime" id="in_stockTime" value="<?php echo $in_stockTime?>"><br>
    out_stockTime:<input type="text" name="out_stockTime" id="out_stockTime" value="<?php echo $out_stockTime?>"><br>
    out_stockOrder:<input type="text" name="out_stockOrder" id="out_stockOrder" value="<?php echo $out_stockOrder?>"><br>
    <input type="submit" name="submitItemModify" id="submitItemModify" value="Submit">
</form>
</body>
</html>
