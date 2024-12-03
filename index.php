<?php 
//Запрос для скидки 
//SELECT `count-partner-product` FROM `partners_import`,`partner_products_import` WHERE `partner_products_import`.`name-partner-product` = `partners_import`.`id-partner-import`;
error_reporting(E_ALL);
require_once("link.php");
session_start();
if(isset($_POST["login"]) && isset($_POST["password"])){
    $username = $_POST["login"];
    $password = $_POST["password"];
    mysqli_real_escape_string($link,$username);
    mysqli_real_escape_string($link,$password);
    $_SESSION["login"] = $username;
    $_SESSION["password"] = $password;
    if($username == "admin"|| $password == "111"){
        $_SESSION["user"] = "admin";
        header("Location:admin.php");
    }else{
        $select = "SELECT `email-partner-import`,`inn-partner-import` FROM `partners_import` WHERE `email-partner-import` = '$username' AND `inn-partner-import` ='$password'";
        $query = mysqli_query($link,$select);
        if(mysqli_num_rows($query) > 0){
            $_SESSION["user"] = "partner";
            header("Location:user.php");
        }else{
            echo "No";
        }
    }
}else{
    echo `<div class="modalBg"><div class="modal"><p>Заполните все поля</p></div></div>`;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<form action="" method="post" id="avtor">
    <input type="text" id="login" name="login" placeholder="Введите логин">
    <input type="password" id="password" name="password" placeholder="Введите пароль">
    <input type="submit" value="Авторизоваться" id="button">
</form>

</body>
</html>