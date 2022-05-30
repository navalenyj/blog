<html>
<?php
session_start();
if ( !isset($_SESSION['user'])){
    header('Location: entrance.php');
}
require_once 'includes/head.php'
?>
<body>

<div class="page">
    <?php
    require_once 'includes/header.php';
    ?>
    <div class="main">
        <div class="container">
            <div class="profile">
                <div class="nick">Привет , <?= $_SESSION['user']['name'] ?></div>
                <div class="row justify-center">
                    <div class="form-container">
                        <form action="App/posts/addPost.php" method="post">
                            <div class="title text-center mt-1">Создание поста</div>
                            <div class="mt-1">
                                <div class="label mb-1">Имя поста</div>
                                <input type="text" name="title">
                            </div>

                            <div class="mt-1">
                                <div class="label mb-1">Темы</div>

                                <select name="theme">
                                <?php
                                require_once 'App/connection/connection.php';
                                $result = $mysqli->query('SELECT * FROM `themes`');

                                while ($theme = $result->fetch_assoc()){
                                    echo $theme['theme'];
                                    ?>
                                        <option  value="<?= $theme['id'] ?>"><?= $theme['theme'] ?></option>
                                    <?php
                                }
                                ?>

                                </select>
                            </div>

                            <div class="mt-1">
                                <div class="label mb-1">Описание</div>
                                <textarea name="desc"></textarea>
                            </div>
                            <div class="mt-1 mb-1 text-center">
                                <div class="msg-error">
                                    <?php
                                    if (isset($_SESSION['error'])) {
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row justify-center">
                                <button class="mt-1">Создать пост</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
    require_once 'includes/footer.php';
    ?>

</div>


</body>
</html>
