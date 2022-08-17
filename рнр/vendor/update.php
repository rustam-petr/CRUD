<?php
include "../config/config.php";

$model=$_POST["model"];
$color=$_POST["color"];
$price=$_POST["price"];
$id=$_POST["id"];


mysqli_query($connect, "UPDATE `cars` SET `model`= '$model', `color`= '$color',`price`= '$price' WHERE `cars`.`id` = $id");
header("location:../index.php");