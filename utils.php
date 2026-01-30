<?php
function text_input($data)  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function redirect($url, $time = 0, $msg = '') {
    $url = str_replace(array("\n", "\r"), '', $url);

    if (empty($msg)) {
        $msg = "The system will automatically redirect to <b>{$url}</b> in {$time} second(s).";
    }

    // If headers already sent, use meta refresh
    if (headers_sent()) {
        $html = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="refresh" content="{$time};url={$url}">
<title>Redirecting...</title>
<style>
    body { margin:0; font-family:Arial,sans-serif; background:#f0f2f5; display:flex; justify-content:center; align-items:center; height:100vh;}
    .card { background:white; padding:30px; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,0.15); text-align:center; max-width:400px;}
    .card h1 { font-size:20px; color:#111827; margin-bottom:16px; }
    .card p { font-size:14px; color:#374151; margin-bottom:24px; }
    .card a { display:inline-block; padding:10px 16px; background:#4f46e5; color:white; border-radius:8px; text-decoration:none; transition:0.2s; }
    .card a:hover { background:#4338ca; }
</style>
</head>
<body>
    <div class="card">
        <h1>Redirecting...</h1>
        <p>{$msg}</p>
        <a href="{$url}">Click here if not redirected</a>
    </div>
</body>
</html>
HTML;
        exit($html);
    }
    else {
        if ($time === 0) {
            header("Location: " . $url);
            exit();
        }
        else {
            header("Content-type: text/html; charset=utf-8");
            header("refresh:{$time};url={$url}");

            // Output same HTML template
            echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="refresh" content="{$time};url={$url}">
<title>Redirecting...</title>
<style>
    body { margin:0; font-family:Arial,sans-serif; background:#f0f2f5; display:flex; justify-content:center; align-items:center; height:100vh;}
    .card { background:white; padding:30px; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,0.15); text-align:center; max-width:400px;}
    .card h1 { font-size:20px; color:#111827; margin-bottom:16px; }
    .card p { font-size:14px; color:#374151; margin-bottom:24px; }
    .card a { display:inline-block; padding:10px 16px; background:#4f46e5; color:white; border-radius:8px; text-decoration:none; transition:0.2s; }
    .card a:hover { background:#4338ca; }
</style>
</head>
<body>
    <div class="card">
        <h1>Redirecting...</h1>
        <p>{$msg}</p>
        <a href="{$url}">Click here if not redirected</a>
    </div>
</body>
</html>
HTML;
            exit();
        }
    }
}
function write_log($path, $msg) {
    $file = fopen($path, "a");
    fwrite($file, $msg."\n");
}
function select_options($type, $id, $name) {
    global $conn;
    echo "<select id=$id name=$name>";
    echo "<option value='' selected>null</option>";
    $sql_inquiry = "select * from $type";
    $result = $conn->query($sql_inquiry);
    while ($row = $result->fetch_assoc())   {
        echo "<option value=$row[id]>".$row[$type."_name"]."</option>";
    }
    echo "</select>";
}