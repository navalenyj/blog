<?php
session_start();
require_once '../connection/connection.php';


if ((int)$_GET['id_user'] == (int)$_SESSION['user']['id']) {


    $id_post = $_GET['id_post'];

    $mysqli->query("DELETE FROM `posts` WHERE `posts`.`id` = '$id_post'");

    header('Location: /index.php');

} else {
    header('Location: /index.php');
}

$mysqli->close();