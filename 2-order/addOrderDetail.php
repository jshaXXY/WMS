<html>
<head>
    <meta charset="UTF-8">
    <title>addOrderDetail</title>
</head>
<body>
<form method="POST" action=<?php echo 'addOrderDetailSave.php?s='.$_GET['id']?>>
    <p>货品：<input type="text" name="itemName" id="itemName"></p>
    <p>订货批量：<input type="text" name="orderBatch" id="orderBatch"></p>
    <p>单价：<input type="text" name="unitPrice" id="unitPrice"></p>
    <p><input type="submit" value="提交" name="Submit"></p>
</form>
<p><a href=<?php echo 'showOrderDetail.php?s='.$_GET['id']?>>返回</a></p>
</body>
</html>