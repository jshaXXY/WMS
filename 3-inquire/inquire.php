<?php
include "functions.php";
include "connect.php";
global $conn;

$itemName = '';
$palletNum = '';
$inTime = '';
$outTime = '';
$sql_stockState_inquire = '';
$sql_itemName_inquire = '';
$sql_palletNum_inquire = '';
$sql_inTime_inquire = '';
$sql_outTime_inquire = '';
$sql_supplierName_inquire = '';
$sql_customerName_inquire = '';
$stockState = '';

if (isset($_POST['B1']) &&  $_SERVER["REQUEST_METHOD"] = "POST")    {
    $supplierName = $_POST['supplierName'];
    $customerName = $_POST['customerName'];
    if (!empty($_POST['isStocked']))    {
        $stockState = $_POST['isStocked'];
        if ($stockState == "inStock")
            $sql_stockState_inquire = "and isStocked = 1 ";
        else if ($stockState == "outStock")
            $sql_stockState_inquire = "and isStocked = 0 ";
    }
    if (!empty($_POST['itemName'])) {
        $itemName = text_input($_POST['itemName']);
        $sql_itemName_inquire = "and itemName LIKE '%$itemName%' ";
    }
    if (!empty($_POST['palletNum'])) {
        $palletNum = text_input($_POST['palletNum']);
        $sql_palletNum_inquire = "and itemPallet=$palletNum ";
    }
    if (!empty($_POST['inTime'])) {
        $inTime = text_input($_POST['inTime']);
        if ($_POST['inTimeCompare'] == ">=")
            $sql_inTime_inquire = "and in_stockTime >= '$inTime' ";
        else
            $sql_inTime_inquire = "and in_stockTime <= '$inTime' ";
    }
    if (!empty($_POST['outTime'])) {
        $outTime = text_input($_POST['outTime']);
        if ($_POST['outTimeCompare'] == ">=")
            $sql_outTime_inquire = "and out_stockTime >= '$outTime' ";
        else
            $sql_outTime_inquire = "and out_stockTime <= '$outTime' ";
    }
    if ($supplierName != "NULL")   {
        $sql_supplierName_inquire = "and supplierName LIKE '%$supplierName%' ";
    }
    if ($customerName != "NULL") {
        $sql_customerName_inquire = "and customerName LIKE '%$customerName%' ";
    }
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>inquire</title>
</head>
<body>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <table border="0" width="100%">
        <tr>
            <td colspan="2">品名：<input type="text" name="itemName" id="itemName" value="<?php echo $itemName?>"></td>
        </tr>
        <tr>
            <td>托盘号：<input type="text" name="palletNum" id="palletNum" value="<?php echo $palletNum?>"></td>
            <td>是否在库：<input type="radio" value="inStock" name="isStocked" id="isStocked" <?php if (isset($stockState) && $stockState=="inStock") echo "checked";?>>是<input type="radio" value="outStock" name="isStocked" id="isStocked" <?php if (isset($stockState) && $stockState=="outStock") echo "checked";?>>否</td>
        </tr>
        <tr>
            <td>供应商：<?php fetchNameList('supplier','supplierName');?></td>
            <td>客户：<?php fetchNameList('customer', 'customerName');?></td>
        </tr>
        <tr>
            <td>入库时间：<select name="inTimeCompare">
                    <option>>=</option>
                    <option><=</option>
                </select><input type="text" name="inTime" id="inTime" value="<?php echo $inTime?>"></td>
            <td>出库时间：<select name="outTimeCompare">
                    <option>>=</option>
                    <option><=</option>
                </select><input type="text" name="outTime" id="outTime" value="<?php echo $outTime?>"></td>
        </tr>
        <tr>
            <td colspan="2">
                <p align="center"><input type="submit" value="提交" name="B1"><input type="reset" value="重置" name="B2"></td>
        </tr>
    </table>
</form>

<?php
$SQL = "SELECT * FROM vw_inquireItem WHERE TRUE ".$sql_stockState_inquire.$sql_itemName_inquire.$sql_palletNum_inquire.$sql_inTime_inquire.$sql_outTime_inquire.$sql_supplierName_inquire.$sql_customerName_inquire;
$result = $conn->query($SQL);
?>
<table border="1">
    <thead>
    <tr>
        <th>货物号</th>
        <th>货物名</th>
        <th>托盘号</th>
        <th>托盘位置</th>
        <th>入库时间</th>
        <th>出库时间</th>
        <th>顾客</th>
        <th>供应商</th>
        <th>是否在库</th>
    </tr>
    </thead>
    <tbody>
<?php
while ($rows=$result->fetch_assoc())    {
    $itemID = $rows['itemID'];
    $_itemName = $rows['itemName'];
    $itemPallet = $rows['itemPallet'];
    $row_bay_level = $rows['row'].'-'.$rows['bay'].'-'.$rows['level'];
    $in_stockTime = $rows['in_stockTime'];
    $out_stockTime = $rows['out_stockTime'];
    $_customerName = $rows['customerName'];
    $_supplierName = $rows['supplierName'];
    $isStocked = $rows['isStocked'];
    echo "<tr>";
    echo "<td>".$itemID."</td>";
    echo "<td>".$_itemName."</td>";
    echo "<td>".$itemPallet."</td>";
    echo "<td>".$row_bay_level."</td>";
    echo "<td>".$in_stockTime."</td>";
    echo "<td>".$out_stockTime."</td>";
    echo "<td>".$_customerName."</td>";
    echo "<td>".$_supplierName."</td>";
    echo "<td>".$isStocked."</td>";
    echo "</tr>";
}
?>
    </tbody>
</table>
</body>
</html>