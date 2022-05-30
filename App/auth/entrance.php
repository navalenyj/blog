<?php
session_start();
function entrance(string $login , string $password){

    require_once '../connection/connection.php';

    $password = md5($password);

    $result =$mysqli->query("SELECT * FROM `users` WHERE `users`.`login` = '$login' AND `users`.`password` = '$password'");

    if ($result->num_rows > 0) {

        while($user = $result->fetch_assoc()) {

            $_SESSION['user'] = [
                'id' => $user['id'],
                'login' => $user['login'],
                'avatar' => $user['avatar'],
                'email' => $user['email'],
                'name' => $user['name'],
                'lastname' => $user['lastname']
            ];

        }

        header('Location: /createPost.php');

    } else {
        $_SESSION['error'] = "Не верный логин либо пароль";
        header('Location: /entrance.php');

    }
    $mysqli->close();

}



entrance($_POST['login'] , $_POST['password']);