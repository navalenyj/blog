<?php
$mysqli = mysqli_connect('localhost' , 'root' , '' , 'polygon');

if($mysqli === false){
    die("ERROR: Нет подключения к бд " . mysqli_connect_error());
}