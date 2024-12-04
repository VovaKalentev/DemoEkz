<?php 
error_reporting(E_ALL);
require_once("link.php");
session_start();
if ($_SESSION["user"] == "admin") {
    $selectAllRequests = "SELECT * FROM `requests`";
    $queryAllRequests = mysqli_query($link, $selectAllRequests);
} else {
    header("Location:index.php");
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
    <?php if (isset($queryAllRequests) && !empty($queryAllRequests)) { ?>
        <table border="1">
            <tr>
                <th>id</th>
                <th>Name partner</th>
                <th>Name product</th>
                <th>Count product</th>
                <th>Approved</th>
                <th>Paid</th>
            </tr>
        <?php while ($row = mysqli_fetch_assoc($queryAllRequests)) {?>
            <tr>
                <td><?php echo $row["id-request"] ?></td>
                <td><?php echo $row["name_partner"] ?></td>
                <td><?php echo $row["name-product"] ?></td>
                <td><?php echo $row["count_product"] ?></td>
                <td><?php if($row["approved"] == NULL){echo "NULL";}else{$row["approved"];}?></td>
                <td><?php if($row["paid"] == NULL){echo "NULL";}else{$row["paid"];}?></td>
            </tr>
        <?php } ?>
        </table>
    <?php } ?>
    <h1>Изменить</h1>
    <form action="" method="post">
        <label for="id">Введите id заявки</label>
        <input type="text" id="id">
        <input type="submit" value="Ввод">
    </form>
    <?php if(isset($_POST["id"]) && !empty($_POST)){
        $id = $_POST["id"];
        mysqli_real_escape_string($link, $id);
        $queryForCurrentRequest = "SELECT * FROM `requests` WHERE `name_partner` = '$id';";
        $selectCurrentRequest = mysqli_query($link,$queryForCurrentRequest );
        if(mysqli_num_rows($selectCurrentRequest) >= 0) {
        while ($enter = mysqli_fetch_assoc($selectCurrentRequest)) {?>
        <label for="id">Id</label>
        <input type="text" value="<?php $enter["id-request"] ?>" id="id" readonly>
        <label for="partner">Name partner</label>
        <input type="text" value="<?php $enter["name_partner"] ?>" id="partner">
        <label for="product">Name product</label>
        <input type="text" value="<?php $enter["name-product"] ?>" id="product">
        <label for="count">Count product</label>
        <input type="text" value="<?php $enter["count_product"] ?>" id="count">
        <label for="approve">Approved</label>
        <input type="text" value="<?php $enter["approved"] ?>" id="approve">
        <label for="paid">Paid</label>
        <input type="text" value="<?php $enter["paid"] ?>" id="paid">
    <?php }}} ?>
    <a href="admin.php" class="exit">Назад</a>
</body>
</html>