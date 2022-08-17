<?php
include "../config/config.php";

$model=$_POST["model"];
$color=$_POST["color"];
$price=$_POST["price"];

mysqli_query($connect, "INSERT INTO `cars` (`id`, `model`, `color`, `price`) VALUES (NULL, '$model', '$color', '$price')");
header("Location: ../index.php");