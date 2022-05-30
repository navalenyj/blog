<html>
<?php
session_start();
require_once 'includes/head.php';
?>
<body>


<div class="page">

    <?php
    require_once 'includes/header.php';
    ?>
    <main class="main">
        <div class="container">
            <div class="row align-flex-start">
                <div class="blog">
                    <?php
                    require_once 'App/connection/connection.php';
                    $result = $mysqli->query("SELECT `posts`.`id` , `posts`.`id_user` , `posts`.`title` , `posts`.`description` ,`posts`.`date` , `themes`.`theme`  , `users`.`login` 
                                                FROM `posts` JOIN `themes` ON `posts`.`id_theme` = `themes`.`id` JOIN `users` ON `posts`.`id_user` = `users`.`id` 
                                                ORDER BY `posts`.`date` DESC");

                    while ($row = $result->fetch_assoc()) {
                        ?>

                        <div class="post">
                            <div class="row space-between">
                                <div class="id-post">#<?= $row['id'] ?></div>
                                <div class="date-post"><?= $row['date'] ?></div>
                            </div>
                            <div class="mt-1">

                                <div class="nick"><?= $row['login'] ?></div>
                            </div>

                            <div class="mt-1">

                                <div class="theme"><?= $row['theme'] ?></div>
                            </div>
                            <div class="title text-center">
                                <?= $row['title'] ?>
                            </div>

                            <div class="content word-break">
                                <?= $row['description'] ?>
                            </div>
                            <?php


                            if ((int)$row['id_user'] === (int)$_SESSION['user']['id']) {
                                ?>
                                <div class="mt-1 row space-between">
                                    <a href="App/posts/deletePost.php?id_post=<?= $row['id'] ?>&id_user=<?= $row['id_user'] ?>">
                                        <img class="post-controller"
                                             src="img/delete.png"
                                             alt=""></a>
                                </div>
                                <?php
                            }
                            ?>


                        </div>

                        <?php
                    }
                    ?>

                </div>


                <div class="account row justify-center text-center">
                    <div>
                        <div class="title">Ваш профиль:</div>
                        <?php

                        if (isset($_SESSION['user'])) {
                            ?>
                            <img class="avatar" src="<?= $_SESSION['user']['avatar'] ?>" alt="">
                            <div class="name"><?= $_SESSION['user']['name'] ?></div>
                            <div class="lastname"><?= $_SESSION['user']['lastname'] ?></div>
                            <?php
                        } else {
                            ?>
                            <div class="mt-1 mb-1">
                                <a href="entrance.php">Войдите в аккаунт</a>
                            </div>

                            <?php
                        }
                        ?>

                    </div>

                </div>
            </div>

        </div>

    </main>
    <?php
    require_once 'includes/footer.php';
    ?>
</div>
</body>
</html>