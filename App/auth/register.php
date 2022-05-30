<?php
session_start();

function register($login, $password, $password_confirm, $email, $name, $lastname)
{

    require_once '../connection/connection.php';

    $error_fields = [];

    if (strlen($login) < 3 || strlen($login) > 24 || preg_match('/[А-Яа-я!"№;%:?*\)\(\s]/', $login)) {
        $error_fields[] = 'login';
    }

    if (strlen($password) < 6 || strlen($password) > 45 || preg_match('/[А-Яа-я\s]/', $password)) {
        $error_fields[] = 'password';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_fields[] = 'email';
    }

    if (mb_strlen($name) < 2 || mb_strlen($name) > 45 || preg_match('/[A-Za-z0-1!"№;%:?*\)\(]/', $name)) {
        $error_fields[] = 'name';
    }

    if (mb_strlen($lastname) < 2 || mb_strlen($lastname) > 45 || preg_match('/[A-Za-z0-1!"№;%:?*\)\(]/', $lastname)) {
        $error_fields[] = 'lastname';
    }

    if ($_FILES['avatar']['name'] == ''){
        $error_fields[] = 'avatar';
    }

    if (!empty($error_fields)) {
        $response = 'Проверьте правильность полей';
        $_SESSION['error'] = $response;
        header('Location: /register.php');
        die();
    }

    if ($password !== $password_confirm) {
        $response = 'Пароли не совпадают';
        $_SESSION['error'] = $response;
        header('Location: /register.php');
        die();
    }

    $path = 'uploads/' . time() . $_FILES['avatar']['name'];
    move_uploaded_file($_FILES['avatar']['tmp_name'], '../../' . $path);

    $password = md5($password);

    $mysqli->query("INSERT INTO `users` (`id`, `login`, `password` , `avatar` , `email`, `name`, `lastname`) VALUES (NULL, '$login', '$password', '$path' , '$email', '$name', '$lastname')");


    $user_id = $mysqli->insert_id;


    $_SESSION['user'] = [
        'id' => $user_id,
        'login' => $login,
        'avatar' => $path,
        'email' => $email,
        'name' => $name,
        'lastname' => $lastname
    ];

    header('Location: /createPost.php');

    $mysqli->close();
}


register($_POST['login'], $_POST['password'], $_POST['password_confirm'], $_POST['email'], $_POST['name'], $_POST['lastname']);