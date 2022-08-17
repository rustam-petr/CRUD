<?php
include "../config/config.php";

$id=$_GET["id"];

mysqli_query($connect, "DELETE FROM `cars` WHERE `cars`.`id` = $id");
header(/** @lang text */ "Location:../index.php");
