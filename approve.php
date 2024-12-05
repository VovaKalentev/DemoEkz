<?php 
error_reporting(E_ALL);
require_once("link.php");
session_start();
if ($_SESSION["user"] != "admin") {
    header("Location:index.php");
}

if (isset($_GET["selectRequest"])){ 
    $names = explode(" ", $_GET["hideName"]);
    $namePartner = $names[0];
    $nameProduct = $names[1];
    $numForm = $names[2];
    if($numForm == 1){
        if($_GET["selectRequest"] == 2){
            $status = $_GET["selectRequest"];
            $update = "UPDATE `requests` SET `status` = '$status' WHERE `requests`.`name_partner` = $namePartner AND `requests`.`name-product` = $nameProduct;";
            $queryForUpdate = mysqli_query($link, $update);
            if ($queryForUpdate) {
                echo "Отлично! Изменение прошло успешно на форме 1";
            }
        }else if($_GET["selectRequest"] == 3){
            $status = $_GET["selectRequest"];
            $update = "UPDATE `requests` SET `status` = '$status' WHERE `requests`.`name_partner` = $namePartner AND `requests`.`name-product` = $nameProduct;";
            $queryForUpdate = mysqli_query($link, $update);
            if ($queryForUpdate) {
                echo "Отлично! Изменение прошло успешно на форме 1";
            }
        }else{
            echo "Ничего не поменялось потому что надо выбрать другое значение для изменения";
        }
    }else if($numForm == 2){
        if($_GET["selectRequest"] == 1){
            $status = $_GET["selectRequest"];
            $update = "UPDATE `requests` SET `status` = '$status' WHERE `requests`.`name_partner` = $namePartner AND `requests`.`name-product` = $nameProduct;";
            $queryForUpdate = mysqli_query($link, $update);
            if ($queryForUpdate) {
                echo "Отлично! Изменение прошло успешно на форме 2";
            }
        }else if($_GET["selectRequest"] == 3){
            $status = $_GET["selectRequest"];
            $update = "UPDATE `requests` SET `status` = '$status' WHERE `requests`.`name_partner` = $namePartner AND `requests`.`name-product` = $nameProduct;";
            $queryForUpdate = mysqli_query($link, $update);
            if ($queryForUpdate) {
                echo "Отлично! Изменение прошло успешно на форме 2";
            }
        }else{
            echo "Ничего не поменялось потому что надо выбрать другое значение для изменения";
        }
    }else if($numForm == 3){
        if($_GET["selectRequest"] == 1){
            $status = $_GET["selectRequest"];
            $update = "UPDATE `requests` SET `status` = '$status' WHERE `requests`.`name_partner` = $namePartner AND `requests`.`name-product` = $nameProduct;";
            $queryForUpdate = mysqli_query($link, $update);
            if ($queryForUpdate) {
                echo "Отлично! Изменение прошло успешно на форме 3";
            }
        }else if($_GET["selectRequest"] == 2){
            $status = $_GET["selectRequest"];
            $update = "UPDATE `requests` SET `status` = '$status' WHERE `requests`.`name_partner` = $namePartner AND `requests`.`name-product` = $nameProduct;";
            $queryForUpdate = mysqli_query($link, $update);
            if ($queryForUpdate) {
                echo "Отлично! Изменение прошло успешно на форме 3";
            }
        }else{
            echo "Ничего не поменялось потому что надо выбрать другое значение для изменения";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <form action="" method="GET" class="formFilter">
        <fieldset>
            <legend>Отфильтровать по</legend>
            <select name="filterRequests" id="filter">
                <option disabled selected>Выберите</option>
                <option value="1">В работе</option>
                <option value="2">Одобренно</option>
                <option value="3">Оплачено</option>
            </select>
            <input type="submit" value="Отфильтровать">
        </fieldset>
    </form>
    <?php if (isset($_GET["filterRequests"])){ 
            if($_GET["filterRequests"] == 1){
                $selectUnapprovedRequests = "SELECT * FROM `requests` WHERE `status` = 1";
                $queryUnapprovedRequests = mysqli_query($link, $selectUnapprovedRequests);
                    while($row = mysqli_fetch_assoc($queryUnapprovedRequests)) {?>
                        <form action="" method="GET">
                            <div><?php echo "Партнер" . $row["name_partner"];?></div>
                            <div><?php echo "Материал" . $row["name-product"]; ?></div>
                            <div><?php echo "Количество" . $row["count_product"]; ?></div>
                            <input type="text" name="hideName" value="<?php echo $row["name_partner"] . " " . $row["name-product"] . " 1";?>" hidden>
                            <select name="selectRequest" id="selectRequest">
                                <option value="1" selected>В работе</option>
                                <option value="2">Одобренно</option>
                                <option value="3">Оплачено</option>
                            </select>
                            <input type="submit" value="Изменить">
                        </form>
                    <?php }
            }else if($_GET["filterRequests"] == 2){
                $selectApprovedRequests = "SELECT * FROM `requests` WHERE `status` = 2";
                $queryApprovedRequests = mysqli_query($link, $selectApprovedRequests);
                    while($row = mysqli_fetch_assoc($queryApprovedRequests)) {?>
                        <form action="" method="GET">
                            <div><?php echo "Партнер" . $row["name_partner"]; ?></div>
                            <div><?php echo "Материал" . $row["name-product"]; ?></div>
                            <div><?php echo "Количество" . $row["count_product"]; ?></div>
                            <input type="text" name="hideName" value="<?php echo $row["name_partner"] . " " . $row["name-product"] . " 2";?>" hidden>
                            <select name="selectRequest" id="selectRequest">
                                <option value="1">В работе</option>
                                <option value="2" selected>Одобренно</option>
                                <option value="3">Оплачено</option>
                            </select>
                            <input type="submit" value="Изменить">
                        </form>
                    <?php }
            }else if($_GET["filterRequests"] == 3){
                $selectPaidRequests = "SELECT * FROM `requests` WHERE `status` = 3";
                $queryPaidRequests = mysqli_query($link, $selectPaidRequests);
                while($row = mysqli_fetch_assoc($queryPaidRequests)) {?>
                    <form action="" method="GET">
                        <div><?php echo "Партнер" . $row["name_partner"]; ?></div>
                        <div><?php echo "Материал" . $row["name-product"]; ?></div>
                        <div><?php echo "Количество" . $row["count_product"]; ?></div>
                        <input type="text" name="hideName" value="<?php echo $row["name_partner"] . " " . $row["name-product"] . " 3";?>" hidden>
                        <select name="selectRequest" id="selectRequest">
                            <option value="1">В работе</option>
                            <option value="2">Одобренно</option>
                            <option value="3" selected>Оплачено</option>
                        </select>
                        <input type="submit" value="Изменить">
                    </form>
                <?php } ?>
        </table>
    <?php }} ?>
    <a href="updateRequest.php" class="link">Изменить заявки</a>
    <a href="admin.php" class="exit">Назад</a>
</body>
</html>