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
if($_SERVER['REQUEST_METHOD'] == "POST"){
    header("Location:updateRequest.php");
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
                <td><?php echo $row["id-request"]; ?></td>
                <td><?php echo $row["name_partner"]; ?></td>
                <td><?php echo $row["name-product"]; ?></td>
                <td><?php echo $row["count_product"]; ?></td>
                <td><?php echo $row["approved"];?></td>
                <td><?php echo $row["paid"];?></td>
            </tr>
        <?php } ?>
        </table>
    <?php } ?>
    <h1>Изменить</h1>
    <form action="" method="post">
        <label for="idd">Введите id заявки</label>
        <input type="text" id="idd">
        <input type="submit" value="Ввод">
    </form>

    <a href="admin.php" class="exit">Назад</a>
</body>
</html>