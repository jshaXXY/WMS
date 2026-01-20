<?php
session_start();

# exit if not authorized
$authorization_level = $_SESSION['authorization_level'];
if ($authorization_level != '5')    {
    exit();
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>user management</title>
    </head>
    <body>
        test!!!
    </body>
</html>