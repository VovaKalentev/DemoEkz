<?php 
    error_reporting(E_ALL);
    require_once("link.php");
    session_start();
    if($_SESSION["user"] == "admin"){
        $selectForAllPartners = "SELECT `type-partner-import`,`name-partner-import`,`manager-partner-import`,`phone-partner-import`,`reit-partner-import` FROM `partners_import`";
        $queryForAllPartners = mysqli_query($link, $selectForAllPartners);
    }else{
        header("Location:index.php");
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
    <section class="mainWrapper">
        <?php if(isset($queryForAllPartners) && !empty($queryForAllPartners)){ ?>
            <?php while($row = mysqli_fetch_assoc($queryForAllPartners)){
                if($row["name-partner-import"] != "admin"){?>
                <article class="cardWrapper">
                    <div class="wrOnArticle">
                        <p><?php echo $row["type-partner-import"] . " | " . $row["name-partner-import"];?></p>
                        <p><?php echo $row["manager-partner-import"];?></p>
                        <p><?php echo $row["phone-partner-import"];?></p>
                        <p><?php echo "Рейтинг: " . $row["reit-partner-import"];?></p>
                    </div>
                </article>
            <?php }};?>
        <?php }?>
    </section>
    <input type="button" onclick="<?php session_destroy();?>" value="Выход">
    
</body>
</html>