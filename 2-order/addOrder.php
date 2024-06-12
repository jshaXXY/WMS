<?php include "functions.php";?>
<html>
<head>
    <meta charset="UTF-8">
    <title>addOrder</title>
</head>
<body>
<form method="POST" action="addOrderSave.php">
    <p>订单号：自动生成</p>
    <p>客户：<?php fetchNameList('customer','customer')?></p>
    <p>操作员：<?php fetchNameList('operator','operator')?></p>
    <p>订单时间：<input type="text" name="orderTime" id="orderTime"></p>
    <p><input type="submit" value="提交" name="Submit"></p>
</form>
<p><a href="showOrder.php">返回</a></p>
</body>
</html>