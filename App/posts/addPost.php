<?php
session_start();
function addPost(string $title, int $theme , string $desc){
    require_once '../connection/connection.php';

    $error_fields = [];


    if (mb_strlen($title) < 3 || mb_strlen($title) > 24 || preg_match('/[A-Za-z!"№;%:?*\)\(]/', $title)) {
        $error_fields[] = 'title';
    }


    if (mb_strlen($desc) < 24 || mb_strlen($desc) > 1000 || preg_match('/[A-Za-z!"№;%:?*\)\(]/', $desc)) {
        $error_fields[] = 'desc';
    }


    if (!empty($error_fields)) {
        $response = 'Проверьте правильность полей';
        $_SESSION['error'] = $response;

        header('Location: /createPost.php');
        die();
    }

    $user_id = $_SESSION['user']['id'];

    $mysqli->query("INSERT INTO `posts` (`id`, `id_user`, `id_theme`, `title`, `description`) VALUES (NULL, '$user_id', '$theme', '$title', '$desc')");

    header('Location: /index.php');

    $mysqli->close();
}


addPost($_POST['title'] , $_POST['theme'] , $_POST['desc']);