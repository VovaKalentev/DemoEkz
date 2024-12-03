<?php 
error_reporting(E_ALL);
require_once("link.php");
session_start();
if ($_SESSION["user"] == "admin") {
    if(isset($_POST["type"]) && isset($_POST["name"]) && isset($_POST["manager"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["uradres"]) && isset($_POST["inn"]) && isset($_POST["reit"])){
        
    }else{
        echo "Заполните все поля";
    }
} else {
    header("Location:index.php");
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
        <label for="type">Введите тип партнера</label>
        <input type="text" id="type" name="type">
        <label for="name">Введите название партнера</label>
        <input type="text" id="name" name="name">
        <label for="manager">Введите ФИО директора</label>
        <input type="text" id="manager" name="manager">
        <label for="email">Введите email партнера</label>
        <input type="text" id="email" name="email">
        <label for="phone">Введите номер телефона партнера</label>
        <input type="text" id="phone" name="phone">
        <label for="uradres">Введите юридический адрес партнера</label>
        <input type="text" id="uradres" name="uradres">
        <label for="inn">Введите ИНН партнера</label>
        <input type="text" id="inn" name="inn">
        <label for="reit">Введите рейтинг партнера</label>
        <input type="text" id="reit" name="reit">
        <input type="submit" value="Создать">
    </form>
    
</body>
</html>