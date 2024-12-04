<?php 
if(isset($_POST["id"])){
    echo "eee";
    $id = $_POST["id"];
    $queryForCurrentRequest = "SELECT * FROM `requests` WHERE `id-request` = '$id';";
    $selectCurrentRequest = mysqli_query($link,$queryForCurrentRequest );
    if(mysqli_num_rows($selectCurrentRequest) > 0) {
    }
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
<?php if(isset($_POST["id"]) && !empty($_POST)){
        $id = $_POST["id"];
        $queryForCurrentRequest = "SELECT * FROM `requests` WHERE `id-request` = '$id';";
        $selectCurrentRequest = mysqli_query($link,$queryForCurrentRequest );
        if(mysqli_num_rows($selectCurrentRequest) > 0) {
        echo `<form action="" method="post">`;
        while ($enter = mysqli_fetch_assoc($selectCurrentRequest)) {?>
        <label for="id">Id</label>
        <input type="text" value="<?php $enter["id-request"]; ?>" id="id" readonly>
        <label for="partner">Name partner</label>
        <input type="text" value="<?php $enter["name_partner"]; ?>" id="partner">
        <label for="product">Name product</label>
        <input type="text" value="<?php $enter["name-product"]; ?>" id="product">
        <label for="count">Count product</label>
        <input type="text" value="<?php $enter["count_product"]; ?>" id="count">
        <label for="approve">Approved</label>
        <input type="text" value="<?php $enter["approved"]; ?>" id="approve">
        <label for="paid">Paid</label>
        <input type="text" value="<?php $enter["paid"]; ?>" id="paid">
    <?php }
    echo `</form>`;
    }else{
        echo "noo";
    }} ?>
</body>
</html>