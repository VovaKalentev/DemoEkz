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
    echo "Заполните все поля";
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
<form action="" method="post">
    <label for="login">Введите свой email</label>
    <input type="text" id="login" name="login">
    <label for="password">Введите свой пароль</label>
    <input type="password" id="password" name="password">
    <input type="submit" value="Авторизоваться">
</form>

</body>
</html>