<html>
<head>
    <meta charset="UTF-8">
    <title>addOrder</title>
</head>
<body>
<form method="POST" action="addOrder.php">
    <p>商品编号：自动生成</p>
    <p>品名：<input type="text" name="itemName" id="itemName"></p>
    <p>托盘：<input type="text" name="itemPallet" id="itemPallet"></p>
    <p>供应订单：<input type="text" name="in_stockSupply" id="in_stockSupply"></p>
    <p>是否在库存中：<input type="text" name="isStocked" id="isStocked"></p>
    <p>入库时间：<input type="text" name="in_stockTime" id="in_stockTime"></p>
    <p>出库时间：<input type="text" name="out_stockTime" id="out_stockTime"></p>
    <p>出库订单：<input type="text" name="out_stockOrder" id="out_stockOrder"></p>
    <p>
        操作员：
            <?php include "functions.php"; fetchNameList('operator',"operator")?>
    </p>
    <p><input type="submit" value="提交" name="Submit"></p>
</form>
<p><a href="showOrder.php">返回</a></p>
</body>
</html>