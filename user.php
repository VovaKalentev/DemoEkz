<?php 
error_reporting(E_ALL);
require_once("link.php");
session_start();
print_r($_SESSION);
$username = $_SESSION["login"];
$password = $_SESSION["password"];
$selectThisPartner = "SELECT * FROM `partners_import` WHERE `email-partner-import` = '$username' AND `inn-partner-import` ='$password'";
$queryForThisPartner = mysqli_query($link,$selectThisPartner);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page user</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<section class="mainWrapper">
        <?php if(isset($queryForThisPartner) && !empty($queryForThisPartner)){ ?>
            <?php $row = mysqli_fetch_assoc($queryForThisPartner);?>
                <article class="cardWrapper">
                    <div class="wrOnArticle">
                        <p><?php echo $row["type-partner-import"] . " | " . $row["name-partner-import"];?></p>
                        <p><?php echo $row["manager-partner-import"];?></p>
                        <p><?php echo $row["phone-partner-import"];?></p>
                        <p><?php echo "Рейтинг: " . $row["reit-partner-import"];?></p>
                    </div>
                </article>
            <?php };?>
    </section>
    <input type="button" onclick="<?php session_destroy();?>" value="Выход">
</body>
</html>