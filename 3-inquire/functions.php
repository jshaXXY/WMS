<?php

include "connect.php";
function redirect($url, $time = 0, $msg = '')
{
    $url = str_replace(array("\n", "\r"), '', $url);
    if (empty($msg)) {
        $msg = "系统将在 {$time}秒 之后自动跳转到 {$url} ！";
    }
    if (headers_sent()) {
        $str = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
        if ($time != 0) {
            $str .= $msg;
        }
        exit($str);
    } else {
        if (0 === $time) {
            header("Location: " . $url);
        } else {
            header("Content-type: text/html; charset=utf-8");
            header("refresh:{$time};url={$url}");
            echo($msg);
        }
        exit();
    }
}

function fetchNameList($type, $selectName, $default = '')   {
    // $type = 'operator','customer','supplier','item'
    global $conn;
    $tableName = 't'.$type;
    $typeName = $type.'Name';
    $sql = "SELECT $typeName FROM $tableName";
    $result = $conn->query($sql);
    echo "<select name='$selectName' id='$selectName'>";
    echo "<option>NULL</option>";
    while ($rows = $result->fetch_assoc())  {
        if ($default != '') {
            if ($rows[$typeName] == $default)   {
                echo "<option selected>";
            }
            else echo "<option>";
        }
        else echo "<option>";
        echo $rows[$typeName];
        echo "</option>";
    }
    echo "</select>";
}

function Name2Number($name, $type) {
    $tableName = 't'.$type;
    $numColumnName = $type."ID";
    $nameColumnName = $type."Name";
    global $conn;
    $sql = "SELECT $numColumnName FROM $tableName WHERE $nameColumnName = '$name'";
    $result = $conn->query($sql);
    while ($rows = $result->fetch_assoc())  {
        $num = $rows[$numColumnName];
    }
    return $num;
}

function text_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
