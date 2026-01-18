<?php
session_start();
$username = $_SESSION['username'];
$log_file_path = $_SESSION['log_file_path'];
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>workspace</title>
    </head>
    <body>
        <?php echo $username; ?>
    </body>
</html>
