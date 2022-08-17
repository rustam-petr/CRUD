<?php

include "config/config.php";
$cars_id=$_GET['id'];
$cars = mysqli_query($connect,"SELECT * FROM `cars` where id=$cars_id ");
$cars = mysqli_fetch_assoc($cars);
//print_r($cars);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Обновить товар </h2>
<form action="vendor/update.php" method="post">
    <input type="hidden" name="id" value="<?=$cars_id?>">
        <p>Введите марку машины</p>
    <input type="text" name="model" value="<?=$cars['model']?>">
    <p>Введите цвет машины</p>
    <input type="text" name="color" value="<?=$cars['color']?>">
    <p>Введите цену машины</p>
    <input type="text" name="price" value="<?=$cars['price']?>">
    <button type="submit" >Обновить</button>
</form>
</body>
</html>