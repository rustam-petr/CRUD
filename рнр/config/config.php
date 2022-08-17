<?php

$connect = mysqli_connect ("localhost","root","root","foods");
if(!$connect){
die ( "Ошибка соединения");
}