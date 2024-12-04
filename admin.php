<?php
error_reporting(E_ALL);
require_once("link.php");
session_start();
if ($_SESSION["user"] == "admin") {
    $selectForAllPartners = "SELECT `id-partner-import`,`type-partner-import`,`name-partner-import`,`manager-partner-import`,`phone-partner-import`,`reit-partner-import` FROM `partners_import`";
    $queryForAllPartners = mysqli_query($link, $selectForAllPartners);
    $summ = 0;
    $sale = 0;
} else {
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <section class="mainWrapper">
        <?php if (isset($queryForAllPartners) && !empty($queryForAllPartners)) { ?>
            <?php while ($row = mysqli_fetch_assoc($queryForAllPartners)) {
                if ($row["name-partner-import"] != "admin") { 
                    $id =$row['id-partner-import'];
                    $selectSaleForPartner = "SELECT `count-partner-product` FROM `partner_products_import` WHERE `partner_products_import`.`name-partner-product` = '$id';";
                    $querySaleForPartner = mysqli_query($link,$selectSaleForPartner);
                    if(mysqli_num_rows($querySaleForPartner) == 0) {
                        $sale =0;
                    }else{
                        while($all = mysqli_fetch_assoc($querySaleForPartner)){
                            $summ += (int)$all["count-partner-product"];
                        }
                        if($summ >= 10000 && $summ <= 50000){
                            $sale = 5;
                        }else if($summ >= 50000 && $summ <= 300000){
                            $sale = 10;
                        }else if($summ >= 300000){
                            $sale = 15;
                        }else{
                            $sale = 0;
                        }
                    }
                    ?>
                    <article class="cardWrapper">
                        <div class="wrOnArticle">
                            <p><?php echo $row["type-partner-import"] . " | " . $row["name-partner-import"]; ?></p>
                            <p><?php echo $row["manager-partner-import"]; ?></p>
                            <p><?php echo $row["phone-partner-import"]; ?></p>
                            <p><?php echo "Рейтинг: " . $row["reit-partner-import"]; ?></p>
                        </div>
                        <div class="right">
                            <p><?php echo $sale . "%";?></p>
                        </div>
                    </article>
                <?php }}; 
            } ?>
    </section>
    <a href="createPartner.php" class="link">Добавить партнера</a>
    <a href="approve.php" class="link">Посмотреть заявки</a>
    <a href="exitpage.php" class="exit">Выход</a>
</body>

</html>