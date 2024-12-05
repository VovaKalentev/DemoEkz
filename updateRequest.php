<?php 
error_reporting(E_ALL);
require_once("link.php");
session_start();
print_r($_SESSION["idRequest"]);
if($_SESSION["user"] == "admin"){
    $queryForCurrentRequest = "SELECT * FROM `requests` WHERE `id-request` = '$id';";
    $selectCurrentRequest = mysqli_query($link,$queryForCurrentRequest );
    if(mysqli_num_rows($selectCurrentRequest) > 0) {
    }
}else{
    echo "noo";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>